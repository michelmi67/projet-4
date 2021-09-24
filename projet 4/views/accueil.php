<?php 
    session_start();
    
?>
<!DOCTYPE html>

<html lang ="fr">
    <head>
        <meta charset="UTF-8"/>
        <title>Projet 4</title>
        <meta name="description" content="&&&&&&"/>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="css/style.css"/>
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
        <script src="https://cdn.tiny.cloud/1/03puxw65ydbv9n6fvxcaqfxnd9h3hk5c1hjm1afabuf62exq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    </head>
    <body class = "accueil" >
        <!--Inclusion du header -->
        <?php include('header.php'); ?>
        <h1>Bienvenue sur le blog de Jean Forteroche !</h1>
        <h3>acteur et écrivain</h3>
        <article>
            <p><img src = "image/jean.jpg" alt = "photo de jean forteroche"/></p>
            <p><strong>Jean Forteroche</strong> , plus connue sous les noms de plume  <strong>J.F Forteroche</strong> et Robert Galbraith, est un romancier et acteur 
                britannique née le 31 juillets 1965 dans l’agglomération de Yate (Gloucestershire du Sud). Il doit sa notoriété mondiale à la série Harry potter, dont les romans 
                traduits en près de quatre-vingts langues ont été vendus à plus de 500 millions d'exemplaires dans le monde.</p>
            <p>Issu d’une famille modeste, il a écrit sa première « histoire » à l'âge de six ans. Après des études à l'université d'Exeter ainsi qu'à la Sorbonne où il a
                obtenu un diplôme en littérature française et en philologie, il a travaillé un temps au sein d'Amnesty International, puis a enseigné l'anglais et le français.
                C'est à vingt-cinq ans qu'il a bâti les premiers concepts et institutions de son univers sorcier, dans lequel un enfant orphelin découvrait à la fois son 
                héritage tragique et ses talents de magicien. Il a rédigé son premier roman,L'Ecole des sorciers, dans un contexte de précarité et de dépression et a dû 
                attendre plus d'un an avant sa publication en 1991chez Bloomsbury.</p>
            <p>Acclamée par ses lecteurs de tout âge et par la critique, J.F Forteroche a remporté de nombreux prix littéraires, notamment lesprix Hugo,Locus et Bram Stoker, 
                et a reçu la croix de chevalier de légion d'honneur en 2009. Il est réputé pour aborder des idées et des thèmes profonds avec accessibilité et humour, et
                s'attacher régulièrement à des personnages placés en marge de la société. Time Magazine l'a élu vice-champion du titre de la Personnalité de l'année en 2007,
                relevant l'inspiration sociale, morale et politique qu'il aurait insufflé à ses fans. En octobre 2010, il a également été nommé « Homme le plus influent de 
                Grande-Bretagne » par les principaux éditeurs de magazines. Très présent sur les réseaux sociaux, où il prend régulièrement la parole sur des sujets politiques
                ou de société qui lui sont chers, il lui arrive aussi d'être critiquée sur ses positions. En 2020, notamment, ses propos sur l'identité de genre font polémique,
                en étant considérés transphobe par des militants de la cause trans et par certains fans.</p>
            <p>Le succès planétaire de son heptalogie romanesque, des films adaptés ainsi que des travaux dérivés de Harry Potter lui ont permis d'acquérir une fortune 
                considérable, dont une partie est régulièrement reversée à de nombreuses associations caritatives luttant contre la maladie et les inégalités sociales. 
                J.F Forteroche est devenue un philantrope reconnue en cofondant notamment l'association Lumosqui œuvre pour la protection de l'enfance.</p>
            <p>Il se tourne vers un public adulte à partir de 2012 en publiant le roman social Une place à prendre, puis en entamant une série policière l'année suivante,
                sous un second nom de plume. Il devient également scénariste pour le cinéma à partir de 2016 en étendant son univers sorcier à travers la série de films Les
                Animaux fantastiquess, dont le premier volet a connu un succès international.</p>
            <h2>Les trois derniers articles du roman : L'Ange du passé.</h2>
        </article>
    
    <!--Les 3 derniers articles du roman-->
    <table>
        <thead>
            <tr>
                <td>Titre</td>
                <td>Texte</td>
            </tr>
        </thead>
        <tbody>
            <?php        
        //recupération des 3 derniers articles
        foreach($articles as $article)
        {
            //instanciation des variables
            $titre = strip_tags($article['titre']);
            $texte = strip_tags($article['texte']);
            ?> 
                <tr>
                    <td><?php echo substr($titre,0,100);?></td> 
                    <td><?php echo substr($texte,0,250);?><p><a href = "article.php?texte=<?php echo $article['id'] ?>" > lire la suite...</a></p></td>
                    
                </tr> 
            <?php            
        }
        ?>
        </tbody>
    </table>

    <!--Inclusion du footer -->
    <?php include('footer.php') ?>

    <!-- javascript -->
    <script src = "js/main.js"></script>
    </body>
</html>