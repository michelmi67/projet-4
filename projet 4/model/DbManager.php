<?php
class DbManager
{
    protected function dbConnect()
    {
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=dbs4504676;charset=utf8','root',''); 
        }
        catch(Exeption $e)
        {
            die('Erreur :' . $e->getMessage());
        }
        return $db;
    }
}