---
title: Home
layout: default
banner_image: /media/banners/club-2017.jpg
banner_text: Le club de robotique jurassien
---

<section class="events-banner">
  <div class="container">
    <h2>Nos événements du mois de mars sont annulés !</h2>
    <div class="row">
      <div class="col-md-6">
        <a href="/semaine-robotique-2020" class="event-block" style="background-image: url(/media/events-banner/marathon.jpg?v=dbfe283e520cc5a237d936d25c946eef)">
          <div class="legend">
            <h3>Marathon de robotique</h3>
            <p>Des épreuves de robotiques à découvrir sur place</p>
            <p><i class="fa fa-calendar"></i> <del>1-2-3 avril: écoliers</del> <strong>ANNULÉ</strong></p>
            <p><i class="fa fa-calendar"></i> <del>Dimanche 5 avril: tout public</del> <strong>ANNULÉ</strong></p>
            <div class="button">Détails</div>
          </div>
        </a>
      </div>
      <div class="col-md-6">
        <a href="https://coupe.robots-ju.ch/" class="event-block" style="background-image: url(/media/events-banner/coupe.jpg?v=f60c0e974c9751ec7f30767b4b43f6ce)">
          <div class="legend">
            <h3>Coupe Robots-JU</h3>
            <p>Le concours jurassien basé sur les épreuves de la FIRST LEGO League</p>
            <p><i class="fa fa-calendar"></i> <del>Samedi 4 avril</del> <strong>ANNULÉ</strong></p>
            <div class="button">Détails</div>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>

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
        <section class="col-md-4">
           <h3>Twitter</h3>
            <a class="twitter-timeline" data-lang="fr" data-height="1000" href="https://twitter.com/RobotsJU">Tweets by RobotsJU</a>
        </section>
        <section class="col-md-4">
           <h3>Facebook</h3>
            <div class="fb-page" data-href="https://www.facebook.com/RobotsJU/" data-tabs="timeline" data-width="" data-height="1000" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/RobotsJU/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/RobotsJU/">Robots-JU</a></blockquote></div>
        </section>
        <section class="col-md-4">
            <h3>Blog</h3>
            <p><i class="fa fa-list"></i> <a href="/tous-les-posts">Posts 2019 et plus anciens</a></p>
        </section>
    </div>
</div>

<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v6.0"></script>
