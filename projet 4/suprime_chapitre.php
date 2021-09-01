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

    //Supression d'un chapitre
    $req = $db->prepare('DELETE  FROM chapitre WHERE id = ?');
    $req->execute(array($_GET['chapitre']));
    header('Location:recup_chapitre.php');
?>