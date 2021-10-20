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
        <?php include('include/head.php')?>
        <!-- Fontawesome -->
        <script src="https://kit.fontawesome.com/2e63600e57.js" crossorigin="anonymous"></script>
    </head>
    <body class = "recup_article">
        <!--Inclusion du header -->
        <div class = container>
            <?php include('include/header.php'); ?>
            <h1>Interface des articles</h1>
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
                    foreach($all_articles as $article)
                    {
                        //instanciation des variables
                        $titre = strip_tags($article['titre']);
                        $texte = strip_tags($article['texte']);
                        ?> 
                        <tr>
                            <td><?php echo $article['id']; ?></td>
                            <td><?php echo substr($titre,0,60)."...";?></td> 
                            <td><?php echo substr($texte,0,100)."...";?></td>
                            <td>
                                <a href = "?action=article&texte=<?php echo $article['id'];?>"><i class="far fa-eye"></i></a>
                                <a href = "?action=modif_article&texte=<?php echo $article['id'];?>"><i class="fas fa-pen"></i></a>
                                <a href = "?action=suprime_article&texte=<?php echo $article['id'];?>"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr> 
                        <?php            
                    }
                    ?>
                </tbody>
            </table>
            <!--Inclusion du footer -->
            <?php include('include/footer.php') ?>
        </div>
            <!-- javascript -->
        <script src = "js/main.js"></script>
    </body>
</html>