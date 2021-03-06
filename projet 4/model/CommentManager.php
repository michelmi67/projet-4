<?php
require_once("model/Manager.php");

class CommentManager extends Manager
{
    function envoi_commentaire($signaler,$moderer,$texte,$pseudo,$commentaire)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO commentaire (id_page,auteur,message,signaler,moderer) VALUES (?,?,?,?,?)');
        $req->execute(array($texte,$pseudo,$commentaire,$signaler,$moderer));
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
        $all_commentaire_signaler = $db->query('SELECT id,id_page,auteur,message,signaler,moderer,DATE_FORMAT(date_creation,\' %d/%m/%Y \') AS date_creation_fr 
        FROM commentaire  WHERE signaler = \'true\'
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

    public function moderation_commentaire($id,$signaler,$moderer)
    {
        $db = $this->dbConnect();
        $id = $_GET['commentaire'];
        $req = $db->prepare('UPDATE commentaire SET signaler = ?, moderer = ? WHERE id = ?');
        $req->execute(array($signaler,$moderer,$id));  
    }

    public function delete_commentaire($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE  FROM commentaire WHERE id = ?');
        $req->execute(array($id));   
    }

    public function signaler_commentaire($id,$signaler)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE commentaire SET signaler = ? WHERE id = ? ');
        $req->execute(array($signaler,$id)); 
    }

    
}