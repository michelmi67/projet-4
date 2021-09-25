<?php

require('model/model.php');


function accueil()
{
    $articles = recup_3_derniers_articles();
    require('views/accueil.php');
}

/*function connection()
{
    $connection = connection_admin();
    require('views/connection.php');

}*/