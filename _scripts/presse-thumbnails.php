<?php

$rawYaml = file_get_contents(__DIR__ . '/../_data/presse.yml');

$entries = preg_split('~^-~m', $rawYaml);

$mediaDirectory = realpath(__DIR__ . '/../media');

$knownInputFiles = [];
$knownOutputFiles = [];

function printHead(string $text)
{
    // Based on https://www.if-not-true-then-false.com/2010/php-class-for-coloring-php-command-line-cli-scripts-output-php-output-colorizing-using-bash-shell-colors/
    echo "\e[1;37m\033[42m" . $text . "\033[0m" . PHP_EOL;
}

function printError(string $text)
{
    echo "\e[1;37m\033[41m" . $text . "\033[0m" . PHP_EOL;
}

function printInfo(string $text)
{
    echo $text . PHP_EOL;
}

foreach ($entries as $index => $entryRawYaml) {
    // There will be a first empty section before the first one due to splitting
    if (empty($entryRawYaml)) {
        continue;
    }

    printHead("Reading entry #$index");

    if (preg_match('~date:\s([0-9]{4}-[0-9]{2}-[0-9]{2})\s~', $entryRawYaml, $matches) === 0) {
        printError('Missing or invalid date!');
        continue;
    }

    $date = $matches[1];

    if (preg_match('~media:\s([a-z]+)\s~', $entryRawYaml, $matches) === 0) {
        printError('Missing media name!');
        continue;
    }

    $media = $matches[1];

    $url = null;
    $file = null;

    if (preg_match('~url:\s(.+?)\s~', $entryRawYaml, $matches) > 0) {
        $url = $matches[1];

        if (substr($url, -4) === '.mp3') {
            printInfo('Skipping sound file');
            continue;
        }
    }

    if (preg_match('~file:\s(.+?)\s~', $entryRawYaml, $matches) > 0) {
        $file = $matches[1];
        $knownInputFiles[] = $file;
    }

    if (is_null($url) && is_null($file)) {
        printError('No url or file!');
        continue;
    }

    $filename = $date . '-' . $media . '.jpg';
    $filepath = $mediaDirectory . '/presse-thumbnails/' . $filename;
    $knownOutputFiles[] = $filename;

    if (file_exists($filepath)) {
        printInfo('File exists. Skipping.');
        continue;
    }

    // If there's both a file and url, we create the thumbnail from the file
    if ($file) {
        $sourcepath = $mediaDirectory . '/presse/' . $file;

        if (!file_exists($sourcepath)) {
            printError("Source file does't exist at $sourcepath");
            continue;
        }

        printInfo("Capturing $file via Imagick...");

        // Based on https://stackoverflow.com/a/32666225/3133038
        // Requires updating Imagick config to allow PDF https://stackoverflow.com/a/52677573
        $imagick = new Imagick($sourcepath . '[0]');
        $imagick->setImageAlphaChannel(Imagick::ALPHACHANNEL_REMOVE); // Prevents black backgrounds
    } else if ($url) {
        printInfo("Capturing $url via headless Chrome...");
        $tmpFile = tempnam('/tmp', 'robotsju');
        $command = 'google-chrome --headless --disable-gpu --hide-scrollbars --window-size=1200,1000 --screenshot=' . escapeshellarg($tmpFile) . ' ' . escapeshellarg($url);
        shell_exec($command);

        printInfo("Resizing image with Imagick...");
        $imagick = new Imagick($tmpFile);
    }

    $imagick->resizeImage(300, 0, Imagick::FILTER_LANCZOS, 0.9);
    $cropY = 0;

    if (strpos($entryRawYaml, 'scan_bottom: yes') !== false) {
        $cropY = $imagick->getImageHeight() - 200;
    }

    $imagick->cropImage(300, 200, 0, $cropY);
    $imagick->setImageFormat('jpg');
    $imagick->writeImage($filepath);
    $imagick->clear();
}

$unknownFiles = array_diff(scandir($mediaDirectory . '/presse'), array_merge(['.', '..'], $knownInputFiles));

foreach ($unknownFiles as $unknownFile) {
    printError("Unused source file $unknownFile");
}

$unknownFiles = array_diff(scandir($mediaDirectory . '/presse-thumbnails'), array_merge(['.', '..'], $knownOutputFiles));

foreach ($unknownFiles as $unknownFile) {
    printError("Unexpected thumbnail file $unknownFile");
}
