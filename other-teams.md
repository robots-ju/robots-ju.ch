---
title: Other Teams
layout: page
permalink: /other-teams
banner_image: /media/banners/countries.jpg
banner_text: Teams we've met
---

Some teams we've met regularly at tournaments.

<div class="row">
  {% for team in site.data.teams %}
    <div class="col-md-6">
      <h3>{{ team.name }}</h3>

      {% if team.from %}
        <p><i class="fa fa-map-marker"></i> From {{ team.from }}</p>
      {% endif %}

      <p>
        <i class="fa fa-calendar-o"></i>
        Seen at
        {% for event_name in team.seen_at %}
          {% if event %},{% endif %}
          {% assign event = site.data.team_events[event_name] %}
          {{ event.title }}
        {% endfor %}
        {% assign event = nil %}
      </p>

      <ul class="list-inline">
        {% if team.website %}<li><a href="{{ team.website }}"><i class="fa fa-globe"></i> Website</a></li>{% endif %}
        {% if team.youtube %}<li><a href="{{ team.youtube }}"><i class="fa fa-youtube"></i> YouTube</a></li>{% endif %}
        {% if team.facebook %}<li><a href="{{ team.facebook }}"><i class="fa fa-facebook"></i> Facebook</a></li>{% endif %}
        {% if team.twitter %}<li><a href="{{ team.twitter }}"><i class="fa fa-twitter"></i> Twitter</a></li>{% endif %}
      </ul>

      {% cycle '', '</div><div class="row">' %}
    </div>
  {% endfor %}
</div>
