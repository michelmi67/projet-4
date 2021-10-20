<?php

require('model/DbManager.php');
require('model/PostManager.php');
require('model/CommentManager.php');
require('model/UserManager.php');


function accueil()
{
    $postManager = new PostManager();
    $articles = $postManager->recup_3_derniers_articles();
    require('views/accueil.php');
}

function index_articles()
{
    $postManager = new PostManager();
    $all_articles = $postManager->recup_all_articles();
    require('views/index_article.php');
}

function article($id)
{
    $postManager = new PostManager();
    $article = $postManager->recup_article($id);
    $tableau_ids = $postManager->recup_id_tableau();
    $commentManager = new CommentManager();
    if($_POST){

        $commenter = $commentManager->envoi_commentaire();
    }
    $all_commentaires = $commentManager->recup_commentaires($id);
    
    //Récupération des Index dans le tableau ID 
     $index_page_courante = array_search(intval($id), $tableau_ids);
     $index_page_precedente = $index_page_courante-1;
     $index_page_suivante = $index_page_courante+1;
     
     //Récupération des ID des pages en fonction de ces index
     if(array_key_exists($index_page_precedente,$tableau_ids))
     {
         $id_page_precedente = $tableau_ids[$index_page_precedente];
     }
     else
     {
         $id_page_precedente = null;
     }
     if(array_key_exists($index_page_suivante,$tableau_ids))
     {
         $id_page_suivante = $tableau_ids[$index_page_suivante];
     }
     else
     {
         $id_page_suivante = null;
     } 
    
    require('views/article.php');
}

function creer_billet($titre,$texte){
    if($titre != null)
    {
        if($_POST){
            $postManager = new PostManager();
            $billet = $postManager->creation_billet($titre,$texte);
        }
    }
    require('views/creer_billet.php');
}

function recup_article_admin()
{
    $postManager = new PostManager();
    $all_articles = $postManager->recup_all_articles();
    require('views/recup_article.php');
}

function modif_article($id,$modifier_titre,$modifier_texte)
{
    $postManager = new PostManager();
    $recup_modif_titre = $postManager->recup_titre($id);
    $recup_modif_texte = $postManager->recup_texte($id);
    if($modifier_titre != null){

        $titre_modifier = $postManager->modif_titre($id,$modifier_titre);
        $texte_modifier = $postManager->modif_texte($id,$modifier_texte);
    }
    require('views/modif_article.php'); 
}

function suprime_article($id)
{
    $postManager = new PostManager();
    $suprime_article = $postManager->delete_article($id);
    require('views/recup_article.php'); 
}

function recup_commentaire_admin(){
    $commentManager = new CommentManager();
    $all_commentaire_signaler = $commentManager->recup_all_commentaire_signaler();
    $all_commentaire = $commentManager->recup_all_commentaire();
    require('views/recup_commentaire.php');
}

function moderer_commentaire($id)
{
    $commentManager = new CommentManager();
    $commentaire_moderer = $commentManager->moderation_commentaire($id);
}

function suprime_commentaire($id)
{
    $commentManager = new CommentManager();
    $suprime_commenatire = $commentManager->delete_commentaire($id);
    require('views/recup_commentaire.php');
}

function signaler($id)
{
    $commentManager = new CommentManager();
    $signaler = $commentManager->signaler_commentaire($id);
    require('views/article.php');
}

function deconnexion()
{
    session_start();
    $_SESSION = array();
    session_destroy();
    header('Location:?action=accueil');
    require('views/header.php');
}

function connexion(){
    
    session_start();

    
    $email_connexion = null;
    $pass_connexion = null;
    $message_erreur = null;
    if(isset($_POST['email_connexion']))
    {
        $email_connexion = htmlspecialchars($_POST['email_connexion']);
        $pass_connexion = htmlspecialchars($_POST['pass_connexion']);
    }
    if($email_connexion != null)
    {   
        $userManager = new UserManager();
        $email = $userManager->connexion_admin($email_connexion,$pass_connexion);
        $pass_correct = password_verify($pass_connexion,$email['pass']);
        //si l'adresse email n'éxiste pas
        if(!$email)
        {
            $message_erreur = 'mauvais identifiant ou mot de passe !';
            
        }
        else
        {
            //Si le mot de passe est correct on fait la connexion
            if($pass_correct)
            {
                
                $_SESSION['id'] = $email['id'];  
                $_SESSION['nom'] = $email['nom'];
                $_SESSION['prenom'] = $email['prenom'];
                $_SESSION['email'] = $email['email'];
                header('Location:?action=accueil');     
            }
            else
            {
                $message_erreur =  'mauvais identifiant ou mot de passe !';
            }
        }    
    }
    require('views/connexion.php');
}

function enregistrement_admin()
{
    $userManager = new UserManager();
    if($_POST){
         //Instanciation des variables
         $nom = htmlspecialchars($_POST['nom']) ;
         $prenom = htmlspecialchars($_POST['prenom']);
         $email = htmlspecialchars($_POST['email']);
         $mdp = htmlspecialchars($_POST['pass']);
         $mdp_verification = htmlspecialchars($_POST['pass_verification']);

        //Si les deux mots de passe renseignés sont les mêmes
        if($mdp === $mdp_verification)
        {
            //on hache le mot de passe
            $mdp_hache = password_hash($mdp, PASSWORD_DEFAULT);

            //Puis on créer un nouveau admin
            $admin = $userManager->enregistrement($nom,$prenom,$email,$mdp_hache);
        }
        else
        {
            $message_erreur =  'Les mots de passe ne sont pas identiques';
        }
        
    }
    require('views/enregistrement_admin.php');
}
