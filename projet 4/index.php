<?php
require('controller/controller.php');

if (isset($_GET['action'])) {
    //URL = monsite.fr?action=accueil
    if ($_GET['action'] == 'accueil') {
        accueil();
    }
    //URL = monsite.fr?action=index_article
    elseif ($_GET['action'] == 'index_article') {
        index_articles();
    }
    //URL = monsite.fr?action=artcile&texte=$id
    elseif($_GET['action'] == 'article') {
        $id = $_GET['texte'];
        article($id);
    }
}    
else {
    accueil();
}