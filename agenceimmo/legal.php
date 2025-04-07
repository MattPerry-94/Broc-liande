<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php session_start(); ?>
    <header>
        <div>
            <img style="border-radius: 30px" src="broceliande-immo-logo-01.jpg" width="25%">
        </div>
        <nav>
            <ul>
                <li><a href="homepage.php">Accueil</a></li>
                <li><a href="sale.php">Vente</a></li>
                <li><a href="rent.php">Location</a></li>
                <li><a href="connection.php">Se connecter</a></li>
                <li><a href="registration.php">S'inscrire</a></li>
                <li><a href="contact.php">Nous contacter</a></li>
                
                <?php if (isset($_SESSION["connected"]) && $_SESSION["connected"] === true) { ?>
                    <li><a href="admin.php">Mes annonces</a></li>
                <?php } ?>
            </ul>
        </nav> 
    </header>

    <div>
        <?php if (isset($_SESSION["connected"]) && $_SESSION["connected"] === true) { ?>
            <form action="logout.php" method="POST">
                <input type="submit" name="logout" id="logout"  value="Se déconnecter" class="btn btn-primary mt-3" style="float: right;"/>
            </form>
        <?php } ?>
    </div>
    
    <div style="width: 65%; margin: auto;" >
        <h1>Mentions Légales</h1><br>
        <h2>Raison sociale : BROCELIANDE IMMOBILIER</h2><br>
            <ul>
                <li>Siège social : 32 avenue de Rennes - Rennes 35000 - France</li>
                <li>RCS : 48872537500015</li>
                <li>Forme sociale : SARL</li>
                <li>Numero TVA Intracommunautaire : *</li>
                <li>Carte professionnelle T n° CPI 0605 2016 000 005 981</li>
                <li>Préfecture de délivrance de la carte professionnelle : CCI Rennes</li>
                <li>Capital : 8000 €</li>
                <li>Caisse garantie financière : GALIAN</li>
                <li>Montant garantie financière : 160000 €</li>
            </ul><br>
        
            <h2>Hébergement</h2><br>
            <ul>
                <li>Le Site est hébergé sur les serveurs de OVH ;</li>
                <li>SAS au capital de 10 069 020 € ;</li>
                <li>Siège social : 2 rue Kellermann - 59100 Roubaix - France ;</li>
                <li>RCS Roubaix / Tourcoing 424 761 419 00011 ;</li>
                <li>N° de téléphone : 08 203 203 63 - 0.118 €/mn</li>
            </ul><br>

            <h2>La protection de la vie privée et des données personnelles</h2><br>
            <p>Le Site collecte les informations personnelles fournies par les Utilisateurs à l'occasion de leur visite sur le Site. Cette collecte permet : L'établissement de statistiques générales sur le trafic sur le Site ; L'envoi vers les adresses mails fournies par les Utilisateurs de réponses, d'informations diverses ou annonces provenant de l'Editeur. La collecte et le traitement des informations personnelles sur Internet doivent se faire dans le respect des droits fondamentaux des personnes. Par conséquent, l'Editeur s'engage à une politique de traitement en conformité avec la loi n°2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique. Tout utilisateur du Site dispose d'un droit d'accès, modification, de rectification ou de suppression aux données personnelles le concernant. Il peut exercer ces droits en contactant l'Editeur aux coordonnées indiquées en haut de page. Pour faciliter l'exercice de ces droits, les Utilisateurs du Site peuvent se désinscrire en cliquant sur les liens hypertextes de désinscription présents sur les mails adressés. Les ordinateurs se connectant aux serveurs du Site reçoivent sur leur disque dur un ou plusieurs fichiers au format texte très légers appelés communément " Cookies ". Les cookies enregistrent des informations relatives à la navigation sur le Site effectuée à partir de l'ordinateur sur lequel est stocké le "cookie" (les pages consultées, la date et l'heure de la consultation, etc.). Ils permettent d'identifier les visites successives faites à partir d'un même ordinateur. Les personnes connectées au Site ont la liberté de s'opposer à l'enregistrement de "cookies". Pour se faire, elles peuvent employer les fonctionnalités correspondantes sur leur navigateur. Cependant, l'Editeur attire l'attention des Utilisateurs que, dans un tel cas, l'accès à certains services du Site peut se révéler altérée, voire impossible.</p>
    </div>
   

    <footer>
            <nav>
                <ul>
                    <li>&copy; 2025 &mdash; Brocéliande Immobilier</li>
                    <li><a href="legal.php">Mentions Légales</a></li>
                </ul>
            </nav> 
    </footer>

</body>
</html>