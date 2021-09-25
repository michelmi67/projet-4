<?php 
    session_start();

    //connexion à la base de données
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8','root','');
    }
    catch(Exeption $e)
    {
        die('Erreur :' .$e->getMessage);
    }
                                
    $signaler = "true";
    $req = $db->prepare('UPDATE commentaire SET signaler = ? WHERE id = ? ');
    $req->execute(array($signaler,$_GET['commentaire']));
    $req->CloseCursor();
    header('Location: ' . $_SERVER['HTTP_REFERER']); 
    

?>