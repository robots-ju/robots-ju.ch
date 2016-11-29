---
title: Contact
layout: page
permalink: /contact
---

Vous pouvez entrer en contact avec nous via ce formulaire. Les champs marqués d'une étoile sont requis.

<form class="contact-form" method="post" action="https://forms.robots-ju.ch/forms/site-contact">
    <div>
        <label for="email">Email (requis)</label>
        <input type="email" name="email" id="email" placeholder="vous@exemple.ch" required>
    </div>

    <div>
        <label for="phone">Téléphone (facultatif)</label>
        <input type="text" name="phone" id="phone" placeholder="0320000000">
    </div>

    <div>
        <label for="message">Message (requis)</label>
        <textarea name="message" id="message" required></textarea>
    </div>

    <button type="submit">Envoyer</button>
</form>

<style>
    /* astuce temporaire pendant la migration depuis Concrete */
    .contact-form label {
        display: block;
    }
    .contact-form textarea {
        width: 30em;
        min-height: 10em;
    }
</style>
