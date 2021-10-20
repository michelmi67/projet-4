<?php 
    session_start();
    if(!isset($_SESSION['id']))
    {
        header('Location:index.php');
    }
?>
<!DOCTYPE html>

<html lang="fr"  >
    <head>
        <?php include('include/head.php')?>
        <script src="https://cdn.tiny.cloud/1/03puxw65ydbv9n6fvxcaqfxnd9h3hk5c1hjm1afabuf62exq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    </head>
    <body class = "modif_article">
        <div class = "container">
            <!--Inclusion du header -->
            <?php include('include/header.php'); ?>
            <h1>Bienvenue sur le blog de Jean Forteroche !</h1>
            <h3>acteur et écrivain</h3>
            <form method = "post" action = "?action=modif_article&texte=<?php echo $recup_modif_texte['id']?>">    
                <textarea id = "modif_titre" name = "modif_titre" placeholder = "Inserer votre Titre" >
                    <?php
                    //Récupération du Titre
                    echo $recup_modif_titre['titre'];
                    ?>
                </textarea>
                <textarea id = "modif_texte" name = "modif_texte" placeholder = "Ecriver votre texte">
                <?php
                    //Récupération du contenu
                    echo $recup_modif_texte['texte'];
                ?>
                </textarea>
                <button class="btn btn-secondary" type = "submit" value = "modifier">envoyer</button>
            </form>
            <!--Inclusion du footer -->
            <?php include('include/footer.php') ?>
        </div>
            <!-- script pour le textarea titre -->
            <script>
                tinymce.init({
                selector: '#modif_titre',
                plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak table lists',
                max_height: 250,
                toolbar_mode: 'floating',
                });    
            </script>
            <!-- script pour le textarea texte -->
            <script>
                tinymce.init({
                selector: '#modif_texte',
                plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak table lists',
                min_height: 450,
                toolbar_mode: 'floating',
            });
            </script>
            <!-- javascript -->
            <script src = "js/main.js"></script>  
    </body>
</html>

