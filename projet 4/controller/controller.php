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
    $tableau_ids = recup_id_tableau();
    $commenter = envoi_commentaire();
    $all_commentaires = recup_commentaires($id);
    require('views/article.php');
}

function creer_billet($titre,$texte){
    $billet = creation_billet($titre,$texte);
    require('views/creer_billet.php');
}
function recup_article_admin()
{
    $all_articles = recup_all_articles();
    require('views/recup_article.php');
}

function recup_commentaire_admin(){
    $all_commentaire_signaler = recup_all_commentaire_signaler();
    require('views/recup_commentaire.php');
}

function modif_article($id)
{
    $recup_modif_titre = recup_titre($id);
    $recup_modif_texte = recup_texte($id);
    require('views/modif_article.php'); 
}