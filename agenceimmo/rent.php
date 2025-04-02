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

<body>
    <?php
        include_once("database.php");
        include_once("functions.php");
        include_once("img.php");
        
        $data = get_all_annonces_rent($pdo);
        
        ?>
    <header>
        <div></div>
            <img style="border-radius: 30px" src="broceliande-immo-logo-01.jpg" width="25%">
        </div>
        <nav>
    <ul>
        <li><a href="homepage.php">Accueil</a></li>
        <li><a href="sale.php">Vente</a></li>
        <li class="selected">Location</li>
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

    <div class="container">
        <div class="row mt-5">
            <h1 class="text-center ">Biens à louer</h1>
        </div>
        <div class="row mt-5">
            <?php
            foreach($data as $key => $annonces_rent):?>
            <div class="col-6">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= $annonces_rent["image_1"] ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $annonces_rent["title_1"]  ?></h5>
                                <h6 class="card-text"> <?= $annonces_rent["content_1"]  ?> </h6>
                                <h6 class="card-text"> <?= $annonces_rent["space_1"]  ?>m2 </h6>
                                <h6 class="card-text"><small class="text-body-secondary"><?= $annonces_rent["price_1"]  ?>€ par mois</small></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
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