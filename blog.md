---
title: Blog
layout: page
permalink: /tous-les-posts
---

Tous nos posts

<ul>
    {% for post in site.posts %}
    <li><a href="{{ post.url }}">{{ post.date | date: "%-d %b %Y" }} - {{ post.title | escape }}</a></li>
    {% endfor %}
</ul>
