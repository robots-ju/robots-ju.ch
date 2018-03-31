---
title: Palmarès
layout: page
permalink: /palmares
banner_image: /media/banners/attestations.jpg
banner_text: Nos performances aux différents concours
---

<table class="table table-palmares">
    <tbody>
        {% assign last_year = nil %}
        {% for competition in site.data.palmares reversed %}
        {% assign competition_year = competition.date | date: "%Y" %}
        {% if competition_year != last_year %}
        <tr class="year-jump">
            <td colspan="6"><h2 class="side-title">{{ competition_year }}</h2></td>
            {% assign last_year = competition_year %}
        </tr>
        {% endif %}
        <tr class="competion-title type-{{ competition.type }}">
            <td colspan="6">
                {% if competition.type == 'fll' %}
                <a class="logo" href="https://www.first-lego-league.org/"><img src="/media/competitions/fll.png"></a>
                {% elsif competition.type == 'roberta' %}
                <a class="logo" href="https://sps.epfl.ch/CoupeRoberta"><img src="/media/competitions/roberta.jpg"></a>
                {% elsif competition.type == 'robotsju' %}
                <a class="logo" href="https://coupe.robots-ju.ch/"><img src="/media/competitions/robotsju.png"></a>
                {% endif %}
                <h3>{{ competition.title }}</h3>
                <p>
                  {{ competition.date }},
                  {{ competition.step }}
                  {{ competition.place }}
                  {% if competition.url %}
                  <a href="{{ competition.url }}" title="Classement sur le site de l'organisateur">Classement détaillé</a>
                  {% endif %}
                </p>
            </td>
        </tr>
        <tr class="competition-headers">
            <th></th>
            <th>Rang</th>
            {% if competition.type == 'fll' %}
            <th>Robot-Game</th>
            <th>Travail d'équipe</th>
            <th>Design du robot</th>
            <th>Travail de recherche</th>
            {% endif %}
            {% if competition.type == 'roberta' or competition.type == 'robotsju' %}
            <th>Robot-Game</th>
            <th>Live Challenge</th>
            {% endif %}
        </tr>
        {% for team in competition.teams %}
        <tr>
            <td>
                {{ team.name }}
                {% if team.qualified %}
                <i class="fa fa-trophy" title="Équipe qualifiée"></i>
                {% endif %}
                {% if team.juryaward %}
                <i class="fa fa-star" title="Jury Award"></i>
                {% endif %}
            </td>
            <td class="standout">{{ team.rank }}</td>
            <td{% if team.scores.robotgame <= 4 %} class="standout"{% endif %}>{{ team.scores.robotgame   }}</td>
            {% if competition.type == 'fll' %}
            <td{% if team.scores.teamwork    == 1 %} class="standout"{% endif %}>{{ team.scores.teamwork    }}</td>
            <td{% if team.scores.robotdesign == 1 %} class="standout"{% endif %}>{{ team.scores.robotdesign }}</td>
            <td{% if team.scores.research    == 1 %} class="standout"{% endif %}>{{ team.scores.research    }}</td>
            {% endif %}
            {% if competition.type == 'roberta' or competition.type == 'robotsju' %}
            <td{% if team.scores.livechallenge == 1 %} class="standout"{% endif %}>{{ team.scores.livechallenge }}</td>
            {% endif %}
        </tr>
        {% endfor %}
        {% if competition.notes %}
        <tr>
            <td colspan="6">
                {% for note in competition.notes %}
                <p class="note">{{ note }}</p>
                {% endfor %}
            </td>
        </tr>
        {% endif %}
        {% endfor %}
    </tbody>
</table>
