<?php 
    session_start();
?>
<!DOCTYPE html>

<html lang="fr">
    <head>
        <?php include('include/head.php')?>
        <!-- Fontawesome -->
        <script src="https://kit.fontawesome.com/2e63600e57.js" crossorigin="anonymous"></script> 
    </head>
    <body class = "article">
        <div class = "container">
            <!--Inclusion du header -->
            <?php include('include/header.php'); ?>
            <?php
                
                //Affichage d'un article;
                echo $article['titre'];
                echo $article['texte'];
                
                    //bouton suivant et précédant          
                    ?>
                    <div class = "suivant_precedent">
                    <?php
                    if(!is_null($id_page_precedente)){
                        ?>
                        <a href = "?action=article&texte=<?php echo $id_page_precedente; ?>" class = "button">précédent</a>
                        <?php
                    }
                    if(!is_null($id_page_suivante)){
                        ?>
                        <a href = "?action=article&texte=<?php echo $id_page_suivante; ?>" class = "button">suivant</a>
                        <?php
                    }
                    ?>
                </div>
            
            <h2>Commentaires</h2>
            <form method = "post" action = "#">
                <input type = "text" name = "pseudo" id = "pseudo" placeholder = "Pseudo" required/><br><br>
                <textarea name = "commentaire" id = "commentaire" placeholder = "Votre commentaire" rows = "6" cols = "75" required ></textarea><br><br>
                <button class = "btn btn-secondary" type = "submit" value = "envoyé">envoyer</button>
            </form>
            
            <?php
                //recupération des commentaire
                foreach($all_commentaires as $commentaire)
                {
                    //si le commentaire n'est pas modéré
                    if($commentaire['moderer'] == "false")
                    {
                        ?>  
                        <div id = "commentaire_<?php echo $commentaire['id'];?>">
                            <table>
                                <tr>
                                    <td>
                                        <strong><?php echo htmlspecialchars($commentaire['auteur']). '</strong>', " le " , htmlspecialchars($commentaire['date_creation_fr']);  ?> :
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo htmlspecialchars($commentaire['message']) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class = "i">
                                        <a href = "?action=signaler&commentaire=<?php echo $commentaire['id'] ?>"><i class="fas fa-exclamation-triangle"></i></a>
                                    </td>
                                </tr>
                            </table>
                        </div>    
                    <?php
                }
                // Si le message est modéré
                if($commentaire['moderer'] == 'true')
                {
                    ?>  
                    <div id = "commentaire_<?php echo $commentaire['id'];?>">
                        <table>
                            <tr>
                                <td>
                                    <strong><?php echo htmlspecialchars($commentaire['auteur']). '</strong>', " le " , htmlspecialchars($commentaire['date_creation_fr']);  ?> : 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Message modéré !</p>
                                </td>
                            </tr>
                        </table>
                    </div>    
                    <?php
                }
            }
            ?>
            <!--Inclusion du footer -->
            <?php include('include/footer.php') ?>
        </div>    
        <!-- javascript -->
        <script src = "js/main.js"></script>
    </body>
</html>