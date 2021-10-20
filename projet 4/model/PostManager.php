<?php
require_once("model/DbManager.php"); 

class PostManager extends DbManager
{
    public function recup_3_derniers_articles()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id,titre,texte FROM (SELECT id,titre,texte, DATE_FORMAT(date_creation,\' %d/%m/%Y \') FROM article ORDER BY id DESC LIMIT 0,3 ) AS date_creation_fr ORDER BY id ASC');
        $articles = [];
        while($row = $req->fetch())
        {
            $articles[] = $row;   
        }
        $req->CloseCursor();
        return $articles;
        }

    public function recup_all_articles()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id,titre,texte,DATE_FORMAT(date_creation,\' %d/%m/%Y \') AS date_creation_fr FROM article ORDER BY id  ');
        $all_articles = [];
        while($row = $req->fetch())
        {
            $all_articles[] = $row;
        }
        $req->CloseCursor();
        return $all_articles;
    }

    public function recup_article($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id,titre,texte FROM article  WHERE id = ?');
        $req->execute(array($id));
        $article = $req->fetch();
        $req->CloseCursor();
        return $article;
    }

    public function recup_id_tableau()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id FROM article'); 
        $tableau_ids = array();
        while ($id_tableau = $req->fetch()) 
        { 
            $tableau_ids[] = (int)$id_tableau['id'];                  
        } 
        return $tableau_ids;
    }

    public function creation_billet($titre,$texte) 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO article (titre,texte) VALUES (?,?)');
        $req->execute(array($titre,$texte));       
    }

    public function recup_titre($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id,titre FROM article where id = ?');
        $req->execute(array($id));
        $recup_modif_titre = $req->fetch();
        return $recup_modif_titre;    
    }

    PUBLIC function recup_texte($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id,texte FROM article WHERE id = ?');
        $req->execute(array($id));
        $recup_modif_texte = $req->fetch();
        return $recup_modif_texte;
    }

    public function modif_titre($id,$modifier_titre)
    {
        $db = $this->dbConnect();
        $modifier_titre = $_POST['modif_titre'];
        $titre_modifier = $db->prepare('UPDATE article SET titre = ? WHERE id = ?');
        $titre_modifier->execute(array($modifier_titre,$id));                   
    }

    public function modif_texte($id,$modifier_texte)
    {
        $db = $this->dbConnect();
        $modifier_titre = $_POST['modif_titre'];
        $titre_modifier = $db->prepare('UPDATE article SET texte = ? WHERE id = ?');
        $titre_modifier->execute(array($modifier_texte,$id));                   
    }

    public function delete_article($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE  FROM article WHERE id = ?');
        $req->execute(array($id));
        header('Location:?action=recup_article');
    }

}