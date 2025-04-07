<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
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
                <li class="selected">Se connecter</li>
                <li><a href="registration.php">S'inscrire</a></li>
                <li><a href="contact.php">Nous contacter</a></li>
                    
                <?php if (isset($_SESSION["connected"]) && $_SESSION["connected"] === true) { ?>
                    <li><a href="admin.php">Mes annonces</a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div>
            <?php if (isset($_SESSION["connected"]) && $_SESSION["connected"] === true) { ?>
                <form action="logout.php" method="POST">
                    <input type="submit" name="logout" id="logout"  value="Se déconnecter" class="btn btn-primary mt-3" style="float: right;"/>
                </form>
            <?php } ?>
        </div>
        <div class="row mt-5">
            <h1 class="text-center">Connectez-vous !</h1>
        </div>
        <div class="row mt-5">
            <div class=" offset-4 col-4">
                <form method="POST" action="p_connection.php">
                    <div class="mt-3">
                        <label for="mail">Mail :</label>
                        <input type="text" name="mail" id="mail" class="form-control" />
                    </div>
                    <div class="mt-3">
                        <label for="pass">mot de passe :</label>
                        <input type="password" name="pass" id="pass" class="form-control" />
                    </div>
                    <input type="submit" name="send" value="Se connecter" class="btn btn-primary mt-3"/>
                </form>
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