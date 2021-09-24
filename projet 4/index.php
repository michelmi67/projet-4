<?php
require('controller/controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'accueil') {
        accueil();
    }
    elseif ($_GET['action'] == 'connection') {
           
        
    }
}
else {
    accueil();
}