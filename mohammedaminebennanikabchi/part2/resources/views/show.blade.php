{% extends 'base.html.twig' %}

{% block body %}
    <h1>{{ article.title }}</h1>
    <p>{{ article.content }}</p>
    <p><strong>Auteur :</strong> {{ article.author }}</p>
    <p><strong>Date de publication :</strong> {{ article.publishedAt|date('d/m/Y') }}</p>
    <a href="{{ path('article_list') }}">Retour à la liste des articles</a>
{% endblock %}