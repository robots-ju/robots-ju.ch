---
title: Outils
layout: nocontainer
permalink: /outils
redirect_from: /projects
banner_image: /media/banners/scoreboard-animalallies.jpg
banner_text: Des logiciels pour le club... et le monde
---

<div class="container page" markdown="1">

# {{ page.title }}

Cette page présente différents outils réalisés dans le cadre du club Robots-JU.
Vous pouvez également les retrouver sur notre compte [GitHub](https://github.com/robots-ju).

Ils ont été développés dans le but d'aider nos équipes ainsi que celles qui souhaiteraient les utiliser,
mais ne sont en aucun cas officiels, ou garantis pour effectuer correctement leur tâche!
**Utilisez-les à vos propres risques!**
Tous les retours sont bienvenus, n'hésitez pas à nous contacter.

Sauf indication contraire ces logiciels sont prévus pour fonctionner avec la dernière version de Chrome ou Firefox et le code est disponible sous licence MIT.
Consultez les dépôts GitHub des projets pour les détails.

<div class="row">
    {% for project in site.projects %}
    <section class="col-md-6">
        <div class="project">
            <div class="screenshot">
                <a href="{{ project.website }}"><img src="{{ project.screenshot }}" alt="{{ project.title }}"></a>
            </div>
            <h2>{{ project.title }}</h2>
            {{ project.content }}
            <ul class="links">
                {% for link in project.links %}
                <li><a href="{{ link.url }}"><i class="fa fa-{{ link.icon }}"></i> {{ link.title }}</a></li>
                {% endfor %}
            </ul>
        </div>
    </section>
    {% cycle '', '</div><div class="row">' %}
    {% endfor %}
</div>

</div>
