<?php 
    session_start();
?>
<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="UTF-8"/>
        <title>Projet 4</title>
        <meta name="description" content="&&&&&&"/>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="css/style.css"/>
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
        <!-- Fontawesome -->
        <script src="https://kit.fontawesome.com/2e63600e57.js" crossorigin="anonymous"></script>
    </head>
    <header>
        <div class = "connection">
            <button><a href = connection.php>Connection admin</a></button>
            <?php
            if(isset($_SESSION['id']))
            {
                ?>
                <button><a href = "creer_billet">Creation billet</a></button>
                <button><a href = "recup_chapitre.php">Interface chapitre</a></button>
                <button><a href = "recup_commentaire.php">Interface commentaire</a></button>
                <?php
            }
            ?>
        </div>
        <div class = "chapitre">
            <button><a href = index.php>Accueil</a></button>
            <button><a href = chapitre.php>Chapitres</a></button>
        </div>
    </header>
    <body class = "recup_chapitre">
        <h1>Bienvenue sur le blog de Jean Forteroche !</h1>
        <h3>acteur et écrivain</h3>
        <?php 
            //connexion à la base de données
            try
            {
                $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8','root','');
            }
            catch(Exeption $e)
            {
                die('Erreur :' .$e->getMessage);
            }
            ?>
            <table>
                <tbody>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>ID chapitre</td>
                            <td>Auteur</td>
                            <td>Message</td>
                            <td>Action</td>
                            <td>Date</td>
                        </tr>
                    </thead>
        <?php        
        //Chapitre
        $req = $db->query('SELECT id,id_chapitre,auteur,message,DATE_FORMAT(date_creation,\' %d/%m/%Y \') AS date_creation_fr FROM commentaire ORDER BY date_creation ');
        while($donnees = $req->fetch())
        {

            //instanciation des variables
            $id = $donnees['id'];
            $id_chapitre = $donnees['id_chapitre'];
            $auteur = $donnees['auteur'];
            $message = strip_tags($donnees['message']);
            $date = $donnees['date_creation_fr'];
            ?> 
                <tr>
                    <td><?php echo $id; ?></td>
                    <td ><?php echo $id_chapitre;?></td>
                    <td><?php echo $auteur; ?></td>  
                    <td><?php echo substr($message,0,100);?></td> 
                    <td>
                        <div class = "action"> 
                            <a href = "commentaire.php?chapitre= <?php echo $donnees['id_chapitre']; ?>"><i class="far fa-eye"></i></a>
                            <a href = "suprime_commentaire.php?commentaire= <?php echo $donnees['id']; ?>"><i class="far fa-trash-alt"></i></a>
                        </div>
                    </td>
                    <td><?php echo $date; ?></td>
                </tr> 
                <?php            
            }
            ?>
            </tbody>
        </table>
    </body>
</html>