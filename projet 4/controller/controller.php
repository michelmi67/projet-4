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
    if($titre != null)
    {

        $billet = creation_billet($titre,$texte);
    }
    require('views/creer_billet.php');
}

function recup_article_admin()
{
    $all_articles = recup_all_articles();
    require('views/recup_article.php');
}

function modif_article($id,$modifier_titre,$modifier_texte)
{
    $recup_modif_titre = recup_titre($id);
    $recup_modif_texte = recup_texte($id);
    if($modifier_titre != null){

        $titre_modifier = modif_titre($id,$modifier_titre);
        $texte_modifier = modif_texte($id,$modifier_texte);
    }
    require('views/modif_article.php'); 
}

function suprime_article($id)
{
    $suprime_article = delete_article($id);
    require('views/recup_article.php'); 
}

function recup_commentaire_admin(){
    $all_commentaire_signaler = recup_all_commentaire_signaler();
    $all_commentaire = recup_all_commentaire();
    require('views/recup_commentaire.php');
}

function moderer_commentaire($id)
{
    $commentaire_moderer = moderation_commentaire($id);
}

function suprime_commentaire($id)
{
    $suprime_commenatire = delete_commentaire($id);
    require('views/recup_commentaire.php');
}

function signaler($id)
{
    $signaler = signaler_commentaire($id);
    require('views/article.php');
}

function deconnexion()
{
    $deconnexion = deconnexion_admin();
    require('views/header.php');
}

function connexion($email_connexion,$pass_connexion){
    
    
    require('views/connexion.php');
    if($email_connexion != null)

    {
        $email = connexion_admin($email_connexion,$pass_connexion);
    }
}

function enregistrement_admin()
{
    $admin = enregistrement();
    require('views/enregistrement_admin.php');
}
