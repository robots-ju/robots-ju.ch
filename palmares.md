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
                <a class="logo" href="https://www.first-lego-league.org/"><img src="/media/competitions/fll.png" alt="Logo compétition FIRST LEGO League"></a>
                {% elsif competition.type == 'roberta' %}
                <a class="logo" href="https://sps.epfl.ch/CoupeRoberta"><img src="/media/competitions/roberta.jpg" alt="Logo Coupe Roberta"></a>
                {% elsif competition.type == 'robotsju' %}
                <a class="logo" href="https://coupe.robots-ju.ch/"><img src="/media/competitions/robotsju.png" alt="Logo Coupe Robots-JU"></a>
                {% elsif competition.type == 'driveit' %}
                <span class="logo"><img src="/media/competitions/driveit.png" alt="Logo compétition Drive-it"></span>
                {% elsif competition.type == '24stunden' %}
                <a class="logo" href="https://24h.helveticrobot.ch/"><i class="fa fa-external-link"></i></a>
                {% elsif competition.type == 'crushtheflag' %}
                <a class="logo" href="http://kidslab.education/crush-the-flag/"><img src="/media/competitions/crushtheflag.png" alt="Logo compétition Crush The Flag"></a>
                {% elsif competition.type == 'robopoly' %}
                <a class="logo" href="https://robopoly.epfl.ch/"><img src="/media/competitions/robopoly.png" alt="Logo compétition Robopoly"></a>
                {% elsif competition.type == 'openday' %}
                <span class="logo"><img src="/media/competitions/openday.png" alt="Logo Open Day Robots-JU"></span>
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
            {% if competition.type == 'fll' or competition.type == 'openday' %}
            <th>Robot-Game</th>
            <th>{% if competition.teamwork_is_core_values %}Valeurs FLL{% else %}Travail d'équipe{% endif %}</th>
            <th>{% if competition.robotdesign_is_extra_challenge %}Extra Challenge{% else %}Design du robot{% endif %}</th>
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
                {% if team.comment %}
                <br><em class="text-muted">{{ team.comment }}</em>
                {% endif %}
            </td>
            <td class="standout">{{ team.rank }}</td>
            {% if competition.type == 'fll' or competition.type == 'roberta' or competition.type == 'robotsju' or competition.type == 'openday' %}
            <td{% if team.scores.robotgame <= 4 %} class="standout"{% endif %}>{{ team.scores.robotgame   }}</td>
            {% endif %}
            {% if competition.type == 'fll' or competition.type == 'openday' %}
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
