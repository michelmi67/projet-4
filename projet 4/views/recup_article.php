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
    <body class = "recup_article">
        <!--Inclusion du header -->
        <?php include('header.php'); ?>
        <h1>Interface des articles</h1>
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
                    <tr>
                        <td>ID</td>
                        <td>Titre</td>
                        <td>Texte</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php        
                    //Article
                    $req = $db->query('SELECT id,titre,texte, DATE_FORMAT(date_creation,\' %d/%m/%Y \') AS date_creation_fr FROM article ORDER BY id ');
                    while($donnees = $req->fetch())
                    {
                        //instanciation des variables
                        $titre = strip_tags($donnees['titre']);
                        $texte = strip_tags($donnees['texte']);
                        ?> 
                        <tr>
                            <td><?php echo $donnees['id']; ?></td>
                            <td><?php echo substr($titre,0,60)."...";?></td> 
                            <td><?php echo substr($texte,0,100)."...";?></td>
                            <td>
                                <a href = "article.php?texte=<?php echo $donnees['id'];?>"><i class="far fa-eye"></i></a>
                                <a href = "modif_article.php?texte=<?php echo $donnees['id'];?>"><i class="fas fa-pen"></i></a>
                                <a href = "suprime_article.php?texte=<?php echo $donnees['id'];?>"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr> 
                        <?php            
                    }
                    ?>
                </tbody>
            </table>
            <!--Inclusion du footer -->
            <?php include('footer.php') ?>
            <!-- javascript -->
        <script src = "js/main.js"></script>
    </body>
</html>