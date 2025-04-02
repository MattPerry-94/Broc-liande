<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/agenceimo/style.css">
<body>
    <?php
        include_once("database.php");
        include_once("functions.php");
       
        
        ?>

    <header>
        <div></div>
            <img style="border-radius: 30px" src="broceliande-immo-logo-01.jpg" width="25%">
        </div>
        <nav>
    <ul>
        <li><a href="homepages.php">Accueil</a></li>
        <li><a href="sale.php">Vente</a></li>
        <li><a href="rent.php">Location</a></li>
        <li><a href="connection.php">Se connecter</a></li>
        <li class="selected">S'inscrire</li>
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
    
    <div class="container">
        <div class="row mt-5">
            <h1 class="text-center">Inscrivez-vous dès maintenant !</h1>
        </div>
        <div class="row mt-5">
            <div class=" offset-4 col-4">
            <form method="POST" action="p_registration.php">
                <div class="mt-3">
                    <label for="username">Nom utilisateur :</label>
                    <input type="text" name="username" id="username" class="form-control" required />
                </div>
                <div class="mt-3">
                    <label for="mail">Mail :</label>
                    <input type="text" name="mail" id="mail" class="form-control" required />
                </div>
                <div class="mt-3">
                    <label for="pass">Mot de passe :</label>
                    <input type="password" name="pass" id="mail" class="form-control " required />
                </div>
                <input type="submit" name="send" value="S'inscrire" class="btn btn-primary mt-3"/>
            </form>
            </div>
        </div>
        <div class="row mt-5">
            <p class="text-center">Déjà inscrit ? <a href="connection.php">Connectez-vous !</a></p> 
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


