<header>
        <div class = "connection">
            <button><a href = connection.php>Connection admin</a></button>
            <?php
            if(isset($_SESSION['id']))
            {
                ?>
                <button><a href = "creer_billet">Creation billet</a></button>
                <button><a href = "recup_chapitre.php">Interface chapitre</a></button>
                <button><a href = "recup_commentaire.php">Interface commentaire</a></button>
                <button><a href = "deconnection.php">Deconnection</a></button>
                <?php
            }
            ?>
        </div>
        <div class = "chapitre">
            <button><a href = index.php>Accueil</a></button>
            <button><a href = index_chapitre.php>Chapitres</a></button>
        </div>
    </header>