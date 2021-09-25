<?php

//Conection à la base de donnée
function db_connect($db = null)
{
     try
     {
         $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8','root',''); 
     }
     catch(Exeption $e)
     {
         die('Erreur :' . $e->getMessage());
     }
}

//récupération d'un article
 function recup_article()
{
    $req = $db->prepare('SELECT id,titre,texte FROM article  WHERE id = ?');
    $req->execute(array($_GET['texte']));
    $donnees = $req->fetch();
    $req->CloseCursor;
}

//Recupération des 3 derniers articles
function recup_3_derniers_articles()
{
    $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8','root',''); 
    $req = $db->query('SELECT id,titre,texte FROM (SELECT id,titre,texte, DATE_FORMAT(date_creation,\' %d/%m/%Y \') FROM article ORDER BY id DESC LIMIT 0,3 ) AS date_creation_fr ORDER BY id ASC');
    $articles = [];
    while($row = $req->fetch()){
        $articles[] = $row;
       
    }
    $req->CloseCursor();
    return $articles;
    
}

//Connection d'un admin
/*function connection_admin()
{
    if($_POST)
    {   
        //connection base de donnée
        $req = $db->query('SELECT id,titre,texte FROM (SELECT id,titre,texte, DATE_FORMAT(date_creation,\' %d/%m/%Y \') FROM article ORDER BY id DESC LIMIT 0,3 ) AS date_creation_fr ORDER BY id ASC');

        //on récupère l'adresse email de l'admin
        $email_connection = htmlspecialchars($_POST['email_connection']);
        $req = $db->prepare('SELECT id,nom,prenom,email,pass FROM admin WHERE email = ?');
        $req->execute(array($email_connection));
        $donnees = $req->fetch();
    
        //recupération du mot de passe
        $pass_connection = htmlspecialchars($_POST['pass_connection']);
        $pass_correct = password_verify($pass_connection,$donnees['pass']);
    
        //si l'adresse email n'éxiste pas
        if(!$donnees)
        {
            echo 'mauvais identifiant ou mot de passe !';
                    
        }
        else
        {
            //Si le mot de passe est correct on fait la connection
            if($pass_correct)
            {
                echo 'vous êtes connecté !';
                $_SESSION['id'] = $donnees['id'];
                $_SESSION['nom'] = $donnees['nom'];
                $_SESSION['prenom'] = $donnees['prenom'];
                $_SESSION['email'] = $donnees['email'];
                header('Location:../views/accueil.php');     
            }
            else
            {
                echo 'mauvais identifiant ou mot de passe !';
            }
        }
        $req->CloseCursor();
    }
}*/