---
title: Blog
layout: page
permalink: /tous-les-posts
---

Tous nos posts.
Consultez également nos pages [Twitter](https://twitter.com/RobotsJU) et [Facebook](https://www.facebook.com/RobotsJU/) pour des photos et autres actualités.

{% assign last_year = nil %}
{% for post in site.posts %}
{% assign post_year = post.date | date: "%Y" %}
{% if post_year != last_year %}
<h2 class="side-title">{{ post_year }}</h2>
 {% assign last_year = post_year %}
{% endif %}
<h3><a href="{{ post.url }}">{{ post.title | escape }}</a></h3>
<p>{{ post.date | date: "%-d %b %Y" }} <a href="{{ post.url }}">Lire <i class="fa fa-arrow-right"></i></a></p>
{% endfor %}
