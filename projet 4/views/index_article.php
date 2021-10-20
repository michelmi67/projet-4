<?php 
    session_start();
    
?>
<!DOCTYPE html>

<html lang="fr">
    <head>
        <?php include('include/head.php')?>
    </head>
    <body class = "index_article">
        <div class = "container">
            <!--Inclusion du header -->
            <?php include('include/header.php'); ?>
            <h1>L'ange du passé</h1>
            <?php 
                foreach($all_articles as $article)
                {
                    $texte = strip_tags($article['texte']);
                    ?> 
                    <div class = "articles">
                        <?php echo $article['titre'];?> 
                        <p class = "texte_<?php echo $article['id'] ?>">
                             <?php echo substr($texte,0,1000)."...";?>
                        <p>
                        <a href = "?action=article&texte=<?php echo $article['id'] ?>" > lire la suite</a>
                    </div>              
                    <?php
                }
            ?>
            <!--Inclusion du footer -->
            <?php include('include/footer.php') ?>
        </div>
        <!-- javascript -->
        <script src = "js/main.js"></script>
        
    </body>
</html>