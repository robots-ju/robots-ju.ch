---
title: Home
layout: page
---

Bienvenue sur le site du club Robots-JU !

Vous êtes nouveau ? Consultez la page [À propos](/about)

## Dernières news

<div id="blog-index">
    {% for post in site.posts limit:10 %}
    <div class="entry ">
        <div class="title">
            <h3><a href="{{ post.url }}">{{ post.title | escape }}</a></h3>
            <h4>Posté le {{ post.date | date: "%-d %b %Y" }}</h4>
        </div>
        <div class="excerpt">
            {{ post.content }}
        </div>
        <div class="meta">
			 <a href="{{ post.url }}">Lire le message complet &raquo;</a>
		</div>
    </div>
    {% endfor %}
</div>

[Tous les posts](/tous-les-posts)
