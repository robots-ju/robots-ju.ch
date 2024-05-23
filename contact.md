---
title: Contact
layout: page
permalink: /contact
banner_image: /media/banners/blackboard.jpg
banner_text: Une question ?
---

Vous pouvez entrer en contact avec nous via ce formulaire.
Nous vous répondrons dans les plus brefs délais.

<form method="post" action="{{ site.contact_form_url }}">
    <div class="form-group">
        <label for="subject">Concerne (requis)</label>
        <select class="form-control" name="subject" id="subject" required>
            <option hidden disabled selected>Sélectionnez...</option>
            <option>Cours Introbots</option>
            <option>Atelier FLL Challenge</option>
            <option>Atelier FLL Explore</option>
            <option>Atelier avancé</option>
            <option>Autre</option>
        </select>
    </div>
    {% include contact-form-common.html %}
</form>
