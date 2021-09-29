<?php

require('model/model.php');


function accueil()
{
    $articles = recup_3_derniers_articles();
    require('views/accueil.php');
}

function index_articles()
{
    $all_articles = recup_all_articles();
    require('views/index_article.php');
}

function article($id)
{
    $article = recup_article($id);
    $commentaires = recup_commentaires($id);
    require('views/article.php');
}