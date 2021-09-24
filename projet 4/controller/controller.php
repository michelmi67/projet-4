<?php

require('model/model.php');


function accueil()
{
    $articles = recup_3_derniers_articles();
    var_dump($articles);

    require('views/accueil.php');
}
