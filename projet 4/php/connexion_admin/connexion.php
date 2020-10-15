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

    <body class="container">

        <header>
        <!-- inclusion du header -->
            <?php include'php/mise_en_page/header.php'; ?>
        </header>

        <nav>
        <!-- inclusion du navigateur -->
            <?php include'php/mise_en_page/nav.php'; ?>
        </nav>

        <form action="admin.php" method="post">
            <p><label>pseudo<input type="text" name="identifiant" required/></label><p>
            <p><label>mot de passe<input type="password"name="password"required/></label/</p>
            <p><input type="submit"/></p>
        </form>
        
        <footer>
            <?php include'php/mise_en_page/footer.php';?>
        </footer>

    </body>
</html>