---
title: Home
layout: default
banner_image: /media/banners/club-2023.jpg
banner_text: Le club de robotique jurassien
---

<section class="banner-image banner-home" style="background-image: url({{ page.banner_image }})">
    <div class="banner-text">
        <div class="container">
            <h2>Le club de robotique jurassien</h2>
            <ul class="social">
                {% for link in site.social_links %}
                <li><a href="{{ link.url }}" title="{{ link.title }}"><span class="fa fa-{{ link.icon }}"></span></a></li>
                {% endfor %}
            </ul>
        </div>
    </div>
</section>

{% include sponsoring.html %}

<div class="container page">
    <div class="row">
        <section class="col-md-4 col-md-push-1">
           <h3>Facebook</h3>
            <div class="fb-page" data-href="https://www.facebook.com/RobotsJU/" data-tabs="timeline" data-width="" data-height="1000" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/RobotsJU/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/RobotsJU/">Robots-JU</a></blockquote></div>
        </section>
        <section class="col-md-6 col-md-push-1 posts-home">
            <h3>Blog</h3>
            {% for post in site.posts limit:5 %}
            {% capture post_year %}{{ post.date | date: '%Y' | plus: 0 }}{% endcapture %}
            <article class="mb-3">
                <h3><a href="{{ post.url }}">{{ post.title | escape }}</a></h3>
                <p>Posté le {{ post.date | date: "%-d %b %Y" }}</p>
                {{ post.excerpt }}
                <p><a href="{{ post.url }}">Lire le message complet <i class="fa fa-arrow-right"></i></a></p>
            </article>
            {% endfor %}
            <p><i class="fa fa-list"></i> <a href="/tous-les-posts">Posts plus anciens</a></p>
        </section>
    </div>
</div>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v6.0"></script>
