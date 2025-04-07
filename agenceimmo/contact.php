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
                <li><a href="homepage.php">Accueil</a></li>
                <li><a href="sale.php">Vente</a></li>
                <li><a href="rent.php">Location</a></li>
                <li><a href="connection.php">Se connecter</a></li>
                <li><a href="registration.php">S'inscrire</a></li>
                <li class="selected">Nous contacter</li>
        
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

    <div class="container">
        <div class="row mt-5">
            <h1 class="text-center">Remplissez le formulaire pour nous contacter</h1>
        </div>
        <div class="row mt-5">
            <div class=" offset-4 col-4">
            <form method="POST" action="p_contact.php">
                <div class="mt-3">
                    <label for="name">Prenom :</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" required>
                </div>
                <div class="mt-3">
                    <label for="name">Nom :</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" required>
                </div>
                <div class="mt-3">
                    <label for="mail">Mail :</label>
                    <input type="text" name="mail" id="mail" class="form-control" required>
                </div>
                <div class="mt-3">
                    <label for="tel">Numéro de téléphone :</label>
                    <input type="tel" name="tel" id="tel" class="form-control" required>
                </div>
                <div class="mt-3">
                    <label for="pass">Message :</label>
                    <textarea type="textarea" name="content" id="content" class="form-control " required></textarea>
                </div>
                <input type="submit" name="send" value="Envoyer" class="btn btn-primary mt-3">
            </form>
            </div>
        </div><br>
        <div>
            <h4>Un autre problème ? Contactez-nous directement à notre adresse mail ou par téléphone !</h4>
            <h4>Tèl. : <a href="tel:+33432536478">+33 4 32 53 64 78</a></h4>
            <h4>Courriel : <a href="mailto:aideimmo@broceliandeimmo.fr">aideimmo@broceliandeimmo.fr</a></h4>
        </div>
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