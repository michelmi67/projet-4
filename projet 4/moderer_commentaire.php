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

    //moderer un commentaire
    $signaler = "false";
    $moderer = "true";
    $id = $_GET['commentaire'];
    $req = $db->prepare('UPDATE commentaire SET signaler = ?, moderer = ? WHERE id = ?');
    $req->execute(array($signaler,$moderer,$id));
    $req->CloseCursor();
    header('Location:recup_commentaire.php');
?>