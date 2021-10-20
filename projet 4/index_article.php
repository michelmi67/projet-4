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
        
    </head>
    <body class = "index_texte">
        <!--Inclusion du header -->
        <?php include('header.php'); ?>
        <h1>L'ange du passé</h1>
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

            
            //Article
            $req = $db->query('SELECT id,titre,texte,DATE_FORMAT(date_creation,\' %d/%m/%Y \') AS date_creation_fr FROM article ORDER BY id  ');
            while($donnees = $req->fetch())
            {
                $texte = strip_tags($donnees['texte']);
                ?> 
                <table>
                    <tbody>
                        <tr>
                            <td ><?php echo $donnees['titre'];?> </td>
                        </tr>
                        <tr>
                            <td class = "texte_<?php echo $donnees['id'] ?>">
                                <?php echo substr($texte,0,1000)."...";?><br>
                                <p><a href = "article.php?texte=<?php echo $donnees['id'] ?>" > lire la suite...</a></p>
                            </td>
                                                
                        </tr>            
                    </tbody>
                </table>
                <?php
            }
        ?>
        <!--Inclusion du footer -->
        <?php include('footer.php') ?>
        <!-- javascript -->
        <script src = "js/main.js"></script>
        
    </body>
</html>