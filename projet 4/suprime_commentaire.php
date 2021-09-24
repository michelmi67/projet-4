<?php 
    session_start();
    if(!isset($_SESSION['id']))
    {
        header('Location:index.php');
    }

    //Connection à la base de données
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8','root','');
    }
    catch(Exeption $e)
    {
        die('Erreur : ' .$e->getMessage());
    }

    //Supression d'un commentaire
    $req = $db->prepare('DELETE  FROM commentaire WHERE id = ?');
    $req->execute(array($_GET['commentaire']));
    header('Location:recup_commentaire.php');
?>