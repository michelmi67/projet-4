<?php 
    session_start();
    if(!isset($_SESSION['id']))
    {
        header('Location:index.php');
    }
?>
<!DOCTYPE html>

<html lang="fr">
    <head>
        <?php include('include/head.php')?>
        <!-- Fontawesome -->
        <script src="https://kit.fontawesome.com/2e63600e57.js" crossorigin="anonymous"></script>
    </head>
    <body class = "recup_commentaire">
        <div class = "container">
            <!--Inclusion du header -->
            <?php include('include/header.php'); ?>
            <h1>Interface des commentaires</h1>
                <table>
                    <thead>
                        <tr >
                            <td colspan = "8">Commentaire signalé</td>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td>ID page</td>
                            <td>Auteur</td>
                            <td>Texte</td>
                            <td>Signaler</td>
                            <td>Modéré</td>
                            <td>Action</td>
                            <td>Date</td>
                        </tr> 
                    </thead>
                    <tbody>
                    <?php        
                        //Récupération des commentaire signalé
                        foreach($all_commentaire_signaler as $commentaire_signaler)
                        {
                            //instanciation des variables
                            $id = $commentaire_signaler['id'];
                            $id_page = $commentaire_signaler['id_page'];
                            $auteur = $commentaire_signaler['auteur'];
                            $message = strip_tags($commentaire_signaler['message']);
                            $signaler = $commentaire_signaler['signaler'];
                            $moderer = $commentaire_signaler['moderer'];
                            $date = $commentaire_signaler['date_creation_fr'];
                            ?> 
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td ><?php echo $id_page;?></td>
                                <td><?php echo $auteur; ?></td>  
                                <td><?php echo substr($message,0,100);?></td>
                                <td><?php echo $signaler; ?></td>
                                <td><?php echo $moderer ; ?></td>
                                <td>
                                <div class = "action"> 
                                    <a href = "?action=article&texte=<?php echo $commentaire_signaler['id_page'];?>#commentaire_<?php echo $commentaire_signaler['id'];?>"><i class="far fa-eye"></i></a>
                                    <a href = "?action=moderer_commentaire&commentaire=<?php echo $commentaire_signaler['id'];?>"><i class="far fa-tired" class = "moderer"></i></a>
                                    <a href = "?action=suprime_commentaire&commentaire=<?php echo $commentaire_signaler['id'];?>"><i class="far fa-trash-alt"></i></a>
                                </div>
                                </td>
                                <td><?php echo $date; ?></td>
                            </tr> 
                            <?php            
                        }
                        ?>
                    </tbody>
                </table>
                <table>
                    <thead>
                        <tr><td colspan = "8">Commentaire</td></tr>
                        <tr>
                            <td>ID</td>
                            <td>ID page</td>
                            <td>Auteur</td>
                            <td>Texte</td>
                            <td>Signaler</td>
                            <td>Modéré</td>
                            <td>Action</td>
                            <td>Date</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php        
                        //Récupération des commentaire
                        foreach($all_commentaire as $commentaire)
                        {
                            //instanciation des variables
                            $id = $commentaire['id'];
                            $id_page = $commentaire['id_page'];
                            $auteur = $commentaire['auteur'];
                            $message = strip_tags($commentaire['message']);
                            $signaler = $commentaire['signaler'];
                            $moderer = $commentaire['moderer'];
                            $date = $commentaire['date_creation_fr'];
                            ?> 
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td ><?php echo $id_page;?></td>
                                <td><?php echo $auteur; ?></td>  
                                <td><?php echo substr($message,0,100);?></td>
                                <td><?php echo $signaler; ?></td> 
                                <td><?php echo $moderer; ?></td>
                                <td>
                                    <div class = "action"> 
                                        <a href = "?action=article&texte=<?php echo $commentaire['id_page'];?>#commentaire_<?php echo $commentaire['id'];?>"><i class="far fa-eye"></i></a>
                                        <a href = "?action=moderer_commentaire&commentaire=<?php echo $commentaire['id'];?>"><i class="far fa-tired"></i></a>
                                        <a href = "?action=suprime_commentaire&commentaire=<?php echo $commentaire['id'];?>"><i class="far fa-trash-alt"></i></a>
                                    </div>
                                </td>
                                <td><?php echo $date; ?></td>
                            </tr> 
                            <?php            
                        }
                        ?>
                    </tbody>
            </table>
            <!--Inclusion du footer -->
            <?php include('include/footer.php') ?>
        </div>
        <!-- javascript -->
        <script src = "js/main.js"></script>
    </body>
</html>