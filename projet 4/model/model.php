<?php

//Conection à la base de donnée
function db_connect()
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
 /*function recup_article()
{
    $req = $db->prepare('SELECT id,titre,texte FROM article  WHERE id = ?');
    $req->execute(array($_GET['texte']));
    $donnees = $req->fetch();
    $req->CloseCursor;
}*/

//Recupération des 3 derniers articles
function recup_3_derniers_articles()
{
    $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8','root',''); 
    $req = $db->query('SELECT id,titre,texte FROM (SELECT id,titre,texte, DATE_FORMAT(date_creation,\' %d/%m/%Y \') FROM article ORDER BY id DESC LIMIT 0,3 ) AS date_creation_fr ORDER BY id ASC');
    $articles = [];
    while($row = $req->fetch())
    {
        $articles[] = $row;   
    }
    $req->CloseCursor();
    return $articles;
    
}

function recup_all_articles()
{
    $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8','root',''); 
    $req = $db->query('SELECT id,titre,texte,DATE_FORMAT(date_creation,\' %d/%m/%Y \') AS date_creation_fr FROM article ORDER BY id  ');
    $all_articles = [];
    while($row = $req->fetch())
    {
        $all_articles[] = $row;
    }
    $req->CloseCursor();
    return $all_articles;
}

function recup_article($id)
{
    $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8','root',''); 
    $req = $db->prepare('SELECT id,titre,texte FROM article  WHERE id = ?');
    $req->execute(array($id));
    $article = $req->fetch();
    $req->CloseCursor();
    return $article;
}