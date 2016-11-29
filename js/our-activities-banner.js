/**
 * Script positionnant la bannière "Nos activités" au-dessus des bons onglets du menu
 * Pour l'utiliser il faut insérer une balise similaire à celle-ci:
 *     <div class="our-activities-banner" data-fromlink="3" data-linkscount="3">Nos activités !</div>
 * fromlink est l'index du premier lien concerné en commençant à 1
 * linkscount est le nombre total de liens concernés par les activités
 * @author Clark Winkelmann
 */

$(document).ready(function() {
	var $banner = $('.our-activities-banner');

	if($banner.length == 0) {
		return;
	}

	// Index commençant à 1
	var $firstLink = $('#header-menu > ul > li:nth-child(' + $banner.data('fromlink') + ')');
	if($firstLink.length == 0) {
		return;
	}
	var distanceStart = $firstLink.offset().left;

	var $lastLink = $('#header-menu > ul > li:nth-child(' + ($banner.data('fromlink') + $banner.data('linkscount') - 1) + ')');
	if($lastLink.length == 0) {
		return;
	}
	var distanceEnd = $lastLink.offset().left + $lastLink.width();

	// Distance entre le bord de la page et la liste
	var distanceMargin = $('#header-menu').offset().left;

	$banner.css({
		left: (distanceStart - distanceMargin) + 'px',
		width: (distanceEnd - distanceStart) + 'px'
	});

	$banner.addClass('enabled');

	$('#header-menu > ul > li').each(function(index) {
		// On ajoute une classe aux éléments du menu concernés
		if(index >= $banner.data('fromlink') -1 && index <= $banner.data('fromlink') + $banner.data('linkscount') - 2) {
			$(this).addClass('our-activities-banner-item');
		}
	});
});
