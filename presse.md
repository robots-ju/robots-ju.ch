---
title: On parle de nous
layout: page
permalink: /presse
banner_image: /media/banners/attestations.jpg
banner_text: Robots-JU dans les médias
---

<div>

{% for article in site.data.presse reversed %}
{% assign year = article.date | date: "%Y" %}
{% if year != last_year %}
</div>
<h2 class="side-title">{{ year }}</h2>
<div class="presse-list">
{% assign last_year = year %}
{% endif %}

{% if article.url %}
<a class="presse-item" href="{{ article.url }}" target="_blank" rel="noopener">
{% elsif article.file %}
<a class="presse-item" href="/media/presse/{{ article.file }}">
{% else %}
<a class="presse-item" href="#">
{% endif %}
  <p class="presse-head">
    <span class="presse-link">
      {% if article.url %}
      Lien externe <i class="fa fa-external-link"></i>
      {% elsif article.file %}
      PDF <i class="fa fa-file-pdf-o"></i>
      {% endif %}
    </span>
    {% if article.tag %}
    <span class="presse-tag">
      {% if article.tag == 'fll' %}FIRST LEGO League
      {% elsif article.tag == 'coupe' %}Coupe Robots-JU
      {% elsif article.tag == 'roberta' %}Coupe Roberta
      {% elsif article.tag == '24h' %}24h de robotique
      {% elsif article.tag == 'arcobot' %}Arcobot
      {% elsif article.tag == 'association' %}Association
      {% else %}<span class="text-danger">Unknown {{ article.tag }}</span>
      {% endif %}
    </span>
    {% endif %}
  </p>
  {% if article.url contains '.mp3' %}
  <div class="presse-icon"><i class="fa fa-volume-up"></i></div>
  {% else %}
  <img src="/media/presse-thumbnails/{% if article.thumbnail_file %}{{ article.thumbnail_file }}{% else %}{{ article.date }}-{{ article.media }}.jpg{% endif %}" alt="Aperçu de l'article du {{ article.date }}">
  {% endif %}
  <h3>{{ article.title }}</h3>
  <p class="presse-source">
    {% if article.media == 'lqj' %}Le Quotidien Jurassien,
    {% elsif article.media == 'rfj' %}Radio Fréquence Jura,
    {% elsif article.media == 'canalalpha' %}Canal Alpha,
    {% elsif article.media == 'agglo' %}L'agglo Delémont,
    {% elsif article.media == 'echodelarche' %}Echo de l'Arche,
    {% elsif article.media == 'lagazette' %}La Gazette,
    {% elsif article.media == 'lematindimanche' %}Le Matin Dimanche,
    {% elsif article.media == 'couleurslocales' %}RTS Couleurs locales,
    {% elsif article.media == 'ajour' %}Journal du Jura,
    {% elsif article.media == 'rcju' %}République et Canton du Jura,
    {% elsif article.media == 'msm' %}Le Mensuel de l'Industrie,
    {% elsif article.media == 'polymedia' %}La Revue Polytechnique,
    {% else %}<span class="text-danger">Unknown {{ article.media }},</span>
    {% endif %}
    {{ article.date }}
  </p>
</a>

{% endfor %}

</div>

© Les articles PDF sont reproduits avec l’autorisation des Editions D+P SA, société éditrice du Quotidien Jurassien
