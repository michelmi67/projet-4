<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="UTF-8"/>
        <title>Projet 4</title>
        <meta name="description" content="&&&&&&"/>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="style.css"/>
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
    </head>

    <body class="container">

        <header>
        <!-- inclusion du header -->
            <?php include'header.php'; ?>
        </header>

        <nav>
        <!-- inclusion du nvaigateur -->
            <?php include'nav.php'; ?>
        </nav>


        <?php
            if(isset($_POST["password"]) && $_POST["password"] == "blabla") {
               echo "ca marche";
            }else{
                echo "mauvais mot de passe";
                
            }    
        ?>

        <footer>
            <?php include'footer.php'?>
        </footer>

        <script src="https://cdn.tiny.cloud/1/03puxw65ydbv9n6fvxcaqfxnd9h3hk5c1hjm1afabuf62exq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="main.js"></script>
    </body>
</html>