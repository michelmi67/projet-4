<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="UTF-8"/>
        <title>Projet 4</title>
        <meta name="description" content="&&&&&&"/>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="css/style.css"/>
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
    </head>

    <body class="container">

        <header>
        <!-- inclusion du header -->
            <?php include'php/mise_en_page/header.php'; ?>
        </header>

        <nav>
        <!-- inclusion du nvaigateur -->
            <?php include'php/mise_en_page/nav.php'; ?>
        </nav>

        <div id="container">
            <img src="image/jean.jpg" alt="photo de jean Forteroche" id="jean"/>
            <h2>Jean Forteroch</h2>
            <p>
                Jean Forteroche, plus connu sous les noms de plume J.Fort, est un romancier et scénariste anglais née le 31 juillet 1965 dans l’agglomération de Yate, dans le Gloucestershire du Sud.
                Il doit sa notoriété mondiale à la série Harry Potter, dont les romans traduits en près de quatre-vingts langues ont été vendus à plus de 500 millions d'exemplaires dans le monde.
                Issu d’une famille modeste, il a écrit sa première « histoire » à l'âge de six ans. Après des études à l'université d'Exeter ainsi qu'à la Sorbonne où il a obtenu un diplôme en littérature française 
                et en philologie, il a travaillé un temps au sein d'Amnesty International, puis a enseigné l'anglais et le français. C'est à vingt-cinq ans qu'il a bâti les premiers concepts et institutions de son
                univers sorcier, dans lequel un enfant orphelin découvrait à la fois son héritage tragique et ses talents de magicien. Il a rédigé son premier roman, L'École des sorciers, dans un contexte de précarité 
                et de dépression et a dû attendre plus d'un an avant sa publication en 1997 chez Bloomsbury.<br>
                Acclamé par ses lecteurs de tout âge et par la critique, J.Fort a remporté de nombreux prix littéraires, notamment les prix Hugo, Locus et Bram Stoker, et a reçu la croix de chevalier de la Légion
                d'honneur en 2009. Il est réputé pour aborder des idées et des thèmes profonds avec accessibilité et humour, et s'attacher régulièrement à des personnages placés en marge de la société.
                Time Magazine l'a élue vice-championne du titre de la Personnalité de l'année en 2007, relevant l'inspiration sociale, morale et politique qu'il aurait insufflé à ses fans. 
                En octobre 2010, il a également été nommé « Homme le plus influent de Grande-Bretagne » par les principaux éditeurs de magazines. Très présent sur les réseaux sociaux, où il prend régulièrement 
                la parole sur des sujets politiques ou de société qui lui sont chers, il lui arrive aussi d'être critiquée sur ses positions. En 2020, notamment, ses propos sur l'identité de genre font polémique,
                en étant considérés transphobes par de nombreux fans et militants de la cause trans.<br>
                Le succès planétaire de son heptalogie romanesque, des films adaptés ainsi que des travaux dérivés de Harry Potter lui ont permis d'acquérir une fortune considérable, dont une partie est régulièrement
                reversée à de nombreuses associations caritatives luttant contre la maladie et les inégalités sociales. J.Fort est devenu un philanthrope reconnu en cofondant notamment l'association Lumos qui œuvre 
                pour la protection de l'enfance.<br>
                Il se tourne vers un public adulte à partir de 2012 en publiant le roman social Une place à prendre, puis en entamant une série policière l'année suivante, sous un second nom de plume. Il devient 
                également scénariste pour le cinéma à partir de 2016 en étendant son univers sorcier à travers la série de films Les Animaux fantastiques, dont le premier volet a connu un succès international.
            </p>
            <h2>Roman : Billet simple pour l'Alaska</h2>
            <p>
                Je veux innover le monde de la lecture. Pour cela, je posterais chaque début de mois, un nouveau chapitre de mon nouveau roman: Billet pour l'Alaska. Une lecture gratuite, ouverte à tous !
                Les premiers chapitres sont déjà à votre disposition...
            </p>
            <div id="billet">
                <h3 class="titre_billet">Billet simple pour l'Alaska</h3>
                <h4 id='chapitre_1'>CHAPITRE 1 :Un nouveau départ</h4>
                <img src="image/alaska.jpg" alt="image de l'Alaska" id="alaska"/>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. In ullam at aspernatur, veniam minima ex dignissimos nobis voluptatem sunt suscipit excepturi illo accusantium voluptates incidunt 
                        vitae atque veritatis! Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae pariatur obcaecati at a ipsam quibusdam soluta officia, quia quam cupiditate, enim velit! Iusto vel deleniti 
                        magnam rem distinctio mollitia fuga.<br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt excepturi magnam neque natus exercitationem explicabo est accusantium ipsam adipisci, eos, nesciunt quidem architecto ex velit quis
                        odio doloremque et fugiat.<br>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Soluta officia sapiente ad dolores illum, minus dolorem accusantium suscipit totam impedit dolore velit consequuntur quae amet.
                        Fugiat quod officiis quia eveniet.
                    </p>
                    <span id='lire'><a href="&&&">lire la suite</a></span>
            </div> 
        </div>
            
            
        <script src="main.js"></script>
    </body>
</html>