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
    $message = 'commentaire modéré !';
    $signaler = 'non';
    $id = $_GET['commentaire'];
    $req = $db->prepare('UPDATE commentaire SET message = ? signaler = ? WHERE id = ?');
    $req->execute(array($message,$signaler,$id));
?>