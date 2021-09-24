<header>
        <div class = "connection">
            <a href = "connection.php" class = "button" id = "button_connection">Connection admin</a>
            <?php
            if(isset($_SESSION['id']))
            {
                ?>
                <a href = "creer_billet" class = "button">Creation billet</a>
                <a href = "recup_article.php" class = "button">Interface article</a>
                <a href = "recup_commentaire.php" class = "button">Interface commentaire</a>
                <a href = "deconnection.php" class = "button" id = "button_deconnection">Deconnection</a>
                <?php
            }
            ?>
        </div>
        <div class = "article">
            <a href = "index.php" class = "button">Accueil</a>
            <a href = "index_article.php" class = "button">Articles</a>
        </div>
    </header>