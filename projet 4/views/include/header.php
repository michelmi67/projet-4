<header>
    <div class = "container-fluid">
        <div class = "connexion">
            <a href = "?action=connexion" class = "btn btn-light" id = "button_connexion">connexion admin</a>
            <?php
            if(isset($_SESSION['id']))
            {
                ?>
                <div class = "row">
                    <a href = "?action=creer_billet" class = "btn btn-light">Creation billet</a>
                    <a href = "?action=recup_article" class = "btn btn-light">Interface article</a>
                    <a href = "?action=recup_commentaire" class = "btn btn-light">Interface commentaire</a>
                    <a href = "?action=deconnexion" class = "btn btn-light" id = "button_deconnexion">Deconnexion</a>
                </div>
                <?php
            }
            ?>
        </div>
        <div class = "article">
            <div class = "row">
                <a href = "?action=accueil" class = "btn btn-light">Accueil</a>
                <a href = "?action=index_article" class = "btn btn-light">Articles</a>
            </div>
        </div>
    </div>
</header>