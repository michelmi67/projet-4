<?php
require('controller/controller.php');

if (isset($_GET['action'])) 
{
    if ($_GET['action'] == 'accueil') 
    {
        accueil();
    }
    elseif ($_GET['action'] == 'index_article') 
    {
        index_articles();
    }
    elseif($_GET['action'] == 'article') 
    {
        $id = $_GET['texte'];
        article($id);
    }
    elseif($_GET['action'] == 'creer_billet')
    {
        $titre = null;
        $texte = null;
        if(isset($_POST['titre']))
        {

            $titre = $_POST['titre'];
            $texte = $_POST['texte'];
        }
        creer_billet($titre,$texte);
        
    }
    elseif($_GET['action'] == 'recup_article')
    {
        recup_article_admin();
    }
    elseif($_GET['action'] == 'modif_article')
    {
        $id = $_GET['texte'];
        $modifier_titre = null;
        $modifier_texte = null;
        if(isset($_POST['modif_titre']))
        {
            $modifier_titre = $_POST['modif_titre'];
            $modifier_texte = $_POST['modif_texte'];
        }
        modif_article($id,$modifier_titre,$modifier_texte);
    }
    elseif($_GET['action'] == 'suprime_article')
    {   
        $id = $_GET['texte'];
        suprime_article($id);
    }
    elseif($_GET['action'] == 'recup_commentaire')
    {
        recup_commentaire_admin();
    }
    elseif($_GET['action'] == 'moderer_commentaire')
    {   
        $id = $_GET['commentaire'];
        moderer_commentaire($id);
    }
    elseif($_GET['action'] == 'suprime_commentaire')
    {
        $id = $_GET['commentaire'];
        suprime_commentaire($id);
    }
    elseif($_GET['action'] == 'signaler')
    {
        $id = $_GET['commentaire'];
        signaler($id);
    }
    elseif($_GET['action'] == 'deconnexion')
    {
        deconnexion();
    }
    elseif($_GET['action'] == 'connexion')
    {
        
        connexion();
    }
    elseif($_GET['action'] == 'enregistrement_admin')
    {
        enregistrement_admin();
    }
    
}    
else {
    accueil();
}