---
title: Home
layout: default
banner_image: /media/banners/club-2016.jpg
banner_text: Le club de robotique jurassien
---

<section class="banner-image banner-home" style="background-image: url({{ page.banner_image }})">
    <div class="banner-text">
        <div class="container">
            <h2>Le club de robotique jurassien</h2>
            <ul class="social">
                {% for link in site.social_links %}
                <li><a href="{{ link.url }}" title="{{ link.title }}"><span class="fa fa-{{ link.icon }}"></span> {{ link.label }}</a></li>
                {% endfor %}
            </ul>
        </div>
    </div>
</section>

{% include sponsoring.html %}

<div class="container page">
    <div class="row">
        <section class="col-md-8">
            <h2>Dernières news</h2>
            <div class="row">
                {% for post in site.posts limit:6 %}
                <article class="col-md-6">
                    <h3><a href="{{ post.url }}">{{ post.title | escape }}</a></h3>
                    <p>Posté le {{ post.date | date: "%-d %b %Y" }}</p>
                    {{ post.excerpt }}
                    <p><a href="{{ post.url }}">Lire le message complet <i class="fa fa-arrow-right"></i></a></p>
                </article>
                {% cycle '', '</div><div class="row">' %}
                {% endfor %}
            </div>
            <div class="row">
                {% for post in site.posts offset:6 limit:6 %}
                <article class="col-md-6">
                    <h3><a href="{{ post.url }}">{{ post.title | escape }}</a></h3>
                    <p>Posté le {{ post.date | date: "%-d %b %Y" }}</p>
                    <p><a href="{{ post.url }}">Lire le message <i class="fa fa-arrow-right"></i></a></p>
                </article>
                {% cycle '', '</div><div class="row">' %}
                {% endfor %}
            </div>
            <h3><i class="fa fa-list"></i> <a href="/tous-les-posts">Tous les posts</a></h3>
        </section>
        <section class="col-md-4">
            <a class="twitter-timeline" data-lang="fr" data-height="2000" href="https://twitter.com/RobotsJU">Tweets by RobotsJU</a>
        </section>
    </div>
</div>

<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
