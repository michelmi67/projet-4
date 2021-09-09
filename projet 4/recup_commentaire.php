<?php 
    session_start();
    if(!isset($_SESSION['id']))
    {
        header('Location:index.php');
    }
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
    <body class = "recup_chapitre">
        <!--Inclusion du header -->
        <?php include('header.php'); ?>
        <h1>Interface</h1>
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
                <thead>
                    <tr >
                        <td colspan = "7">Commentaire signalé</td>
                    </tr>
                    <tr>
                        <td>ID</td>
                        <td>ID page</td>
                        <td>Auteur</td>
                        <td>Message</td>
                        <td>Signaler</td>
                        <td>Action</td>
                        <td>Date</td>
                    </tr> 
                </thead>
                <tbody>
                <?php        
                    //Commentaire signalé
                    $req = $db->query('SELECT id,id_page,auteur,message,signaler,DATE_FORMAT(date_creation,\' %d/%m/%Y \') AS date_creation_fr FROM commentaire  WHERE signaler = \'oui\' ORDER BY date_creation');
                    while($donnees = $req->fetch())
                    {
                        //instanciation des variables
                        $id = $donnees['id'];
                        $id_page = $donnees['id_page'];
                        $auteur = $donnees['auteur'];
                        $message = strip_tags($donnees['message']);
                        $signaler = $donnees['signaler'];
                        $date = $donnees['date_creation_fr'];
                        ?> 
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td ><?php echo $id_page;?></td>
                            <td><?php echo $auteur; ?></td>  
                            <td><?php echo substr($message,0,100);?></td>
                            <td><?php echo $signaler; ?></td> 
                            <td>
                            <div class = "action"> 
                                <a href = "chapitre.php?chapitre=<?php echo $donnees['id_page'];?>#commentaire_<?php echo $donnees['id'];?>"><i class="far fa-eye"></i></a>
                                <a href = "moderer_commentaire.php?commentaire=<?php echo $donnees['id'];?>"><i class="far fa-tired"></i></a>
                                <a href = "suprime_commentaire.php?commentaire=<?php echo $donnees['id'];?>"><i class="far fa-trash-alt"></i></a>
                            </div>
                            </td>
                            <td><?php echo $date; ?></td>
                        </tr> 
                        <?php            
                    }
                    $req->CloseCursor();
                    ?>
                </tbody>
            </table>
            <table>
                <thead>
                    <tr><td colspan = "7">Commentaire</td></tr>
                    <tr>
                        <td>ID</td>
                        <td>ID page</td>
                        <td>Auteur</td>
                        <td>Message</td>
                        <td>Signaler</td>
                        <td>Action</td>
                        <td>Date</td>
                    </tr>
                </thead>
                <tbody>
                    <?php        
                    //Commentaire
                    $req = $db->query('SELECT id,id_page,auteur,message,signaler,DATE_FORMAT(date_creation,\' %d/%m/%Y \') AS date_creation_fr FROM commentaire ORDER BY date_creation ');
                    while($donnees = $req->fetch())
                    {
                        //instanciation des variables
                        $id = $donnees['id'];
                        $id_page = $donnees['id_page'];
                        $auteur = $donnees['auteur'];
                        $message = strip_tags($donnees['message']);
                        $signaler = $donnees['signaler'];
                        $date = $donnees['date_creation_fr'];
                        ?> 
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td ><?php echo $id_page;?></td>
                            <td><?php echo $auteur; ?></td>  
                            <td><?php echo substr($message,0,100);?></td>
                            <td><?php echo $signaler; ?><td> 
                            <div class = "action"> 
                            <a href = "chapitre.php?chapitre=<?php echo $donnees['id_page'];?>#commentaire_<?php echo $donnees['id'];?>"><i class="far fa-eye"></i></a>
                                <a href = "moderer_commentaire.php?commentaire=<?php echo $donnees['id'];?>"><i class="far fa-tired"></i></a>
                                <a href = "suprime_commentaire.php?commentaire=<?php echo $donnees['id'];?>"><i class="far fa-trash-alt"></i></a>
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