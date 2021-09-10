<header>
        <div class = "connection">
            <a href = "connection.php" class = "button" id = "button_admin">Connection admin</a>
            <?php
            if(isset($_SESSION['id']))
            {
                ?>
                <a href = "creer_billet" class = "button">Creation billet</a>
                <a href = "recup_chapitre.php" class = "button">Interface chapitre</a>
                <a href = "recup_commentaire.php" class = "button">Interface commentaire</a>
                <a href = "deconnection.php" class = "button" id = "button_deconnection">Deconnection</a>
                <?php
            }
            ?>
        </div>
        <div class = "chapitre">
            <a href = "index.php" class = "button">Accueil</a>
            <a href = "index_chapitre.php" class = "button">Chapitres</a>
        </div>
    </header>