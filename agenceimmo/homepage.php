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
    <link rel="stylesheet" type="text/css" href="/agenceimo/style.css">
</head>
<body>
    <?php
        include_once("database.php");
        include_once("functions.php");
         
    ?>
    <header>
        <div> 
            <img style="border-radius: 30px" src="broceliande-immo-logo-01.jpg" width="25%">
    </div>
        
           
    <nav>
    <ul>
        <li class="selected">Accueil</li>
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

    <div class="container"id="slide">
        <div class="row mt-5">
            <div class="offset-3 col-6">
                <div id="carouselExampleCaptions" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner" >
                        <div class="carousel-item active">
                            <img src="immo6.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5  class="color_h5">Rennes</h5>
                                <p>Maison moderne 100m2 230 000€</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="immo4.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="color_h5">Quimpert</h5>
                                <p class="color_p">Appartement luxueux 55m2 150 000€.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="immo5.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="color_h5">Vannes</h5>
                                <p>Appartement 48m2 70 000€.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div> <br>

    

    <div class="container" id="presentation">
        <div class="row">
            <div class="offset-1 col-10">
                <p>L'agence BROCELIANDE IMMOBILIER c’est avant tout une structure Familiale. 
                Spécialisée dans la vente d’appartements, de villas, de terrains mais c’est aussi la commercialisation de programmes neufs.  
                Implantée depuis plus de 40 ans, notre agence à permis l'aboutissement de plus 20 000 projets de vie. 
                Grâce à notre équipe, dynamique et ambitieuse, nous avons grandi et maintenu un cap sur la longévité. 
                Le respect et la satisfaction client ont toujours été et reste notre PRIORITÉ. </p> <br>
                <p>Accédez directerment aux pages destinées à la <a href="sale.php">vente</a> ou à la <a href="rent.php">location</a>.</p><br>
                <p>Vous êtes propriétaire et vous souhaitez mettre vos/votre biens en vente ou en location ? <a href="registration.php">Inscrivez-vous</a> à notre programme en vous créant un compte en deux minutes !</p>
                <p>Déjà membre ? <a href="connection.php">Connectez-vous</a> à votre espace pour ajouter ou accéder à vos annonces !</p>
                <p>Vous recherchez un bien à l'achat, vous êtes vendeur, vous avez besoin de prendre conseils auprès de vrais professionnels de l'immobilier, et finaliser ainsi votre projet ?
                    Nos spécialistes se feront un plaisir de vous accompagner dans vos démarches.
                    Contactez nous directement par téléphone, via notre adresse mail ou en remplissent notre formulaire de <a href="contact.php">contact.</a></p><br>
                <p>Tèl. : <a href="tel:+33432536478">+33 4 32 53 64 78</a></p>
                <p>Courriel : <a href="mailto:aideimmo@broceliandeimmo.fr">aideimmo@broceliandeimmo.fr</a></p>
            </div>
        </div>  
    </div>

    
    <footer>
            <nav>
                <ul>
                    <li>&copy; 2025 &mdash; Brocéliande Immobilier</li>
                    <li><a href="legal.php">Mentions Légales</a></li>
                    <li><a href="contact.php">Conctact</a></li>
                </ul>
            </nav> 
    </footer>
      
               
                
    
</body>
</html>