<?php
require_once("model/DbManager.php");

class CommentManager extends DbManager
{
    function envoi_commentaire()
    {
        $signaler = "false";
        $moderer = "false";  
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO commentaire (id_page,auteur,message,signaler,moderer) VALUES (?,?,?,?,?)');
        $req->execute(array($_GET['texte'],$_POST['pseudo'],$_POST['commentaire'],$signaler,$moderer));
        $req->CloseCursor();
    
    }

    public function recup_commentaires($id)
    {
        $db = $this->dbConnect(); 
        $req = $db->prepare('SELECT id,auteur,message,moderer,DATE_FORMAT(date_creation,\'%d/%m/%Y\') AS date_creation_fr FROM commentaire  WHERE id_page = ? ORDER BY id DESC');
        $req->execute(array($id));
        $all_commentaires = [];
        while($row = $req->fetch())
        {
            $all_commentaires[] = $row;
        }
        $req->CloseCursor();
        return $all_commentaires;
    }

    public function recup_all_commentaire_signaler() 
    {
        $db = $this->dbConnect();
        $all_commentaire_signaler = $db->query('SELECT id,id_page,auteur,message,signaler,moderer,DATE_FORMAT(date_creation,\' %d/%m/%Y \') AS date_creation_fr FROM commentaire  WHERE signaler = \'true\'
        ORDER BY date_creation');
        return $all_commentaire_signaler;
    }

    public function recup_all_commentaire()
    {
        $db = $this->dbConnect();
        $all_commentaire = $db->query('SELECT id,id_page,auteur,message,signaler,moderer,DATE_FORMAT(date_creation,\' %d/%m/%Y \') AS date_creation_fr FROM commentaire
        ORDER BY date_creation DESC ');
        return $all_commentaire;
    }

    public function moderation_commentaire($id)
    {
        $db = $this->dbConnect();
        $signaler = "false";
        $moderer = "true";
        $id = $_GET['commentaire'];
        $req = $db->prepare('UPDATE commentaire SET signaler = ?, moderer = ? WHERE id = ?');
        $req->execute(array($signaler,$moderer,$id));
        header('Location:?action=recup_commentaire');
    }

    public function delete_commentaire($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE  FROM commentaire WHERE id = ?');
        $req->execute(array($id));
        header('Location:?action=recup_commentaire');
    }

    public function signaler_commentaire($id)
    {
        $db = $this->dbConnect();
        $signaler = "true";
        $req = $db->prepare('UPDATE commentaire SET signaler = ? WHERE id = ? ');
        $req->execute(array($signaler,$id));
        header('Location: ' . $_SERVER['HTTP_REFERER']); 
    }

    
}