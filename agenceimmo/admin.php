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
        
    ?>
    <header>
        <img style="border-radius: 30px" src="broceliande-immo-logo-01.jpg" width="25%">
        <nav>
            <ul>
                <li><a href="homepage.php">Accueil</a></li>
                <li><a href="sale.php">Vente</a></li>
                <li><a href="rent.php">Location</a></li>
                <li><a href="connection.php">Se connecter</a></li>
                <li><a href="registration.php">S'inscrire</a></li>
                <li><a href="contact.php">Nous contacter</a></li>

                <?php if (isset($_SESSION["connected"]) && $_SESSION["connected"] === true) { ?>
                    <li class="selected">Mes annonces</a></li>
                <?php } ?>
            </ul>
        </nav>
        
    </header>


    <?php session_verify(); ?>
    <?php $id_user = $_SESSION["id"]; ?>
    <?php $annonces_rent = get_all_annonces_rent_by_user_id($pdo, $id_user); ?> 
    <?php $annonces_sale = get_all_annonces_sale_by_user_id($pdo, $id_user);?>

    <div class="container">
        <div class="row">
            <div class="col-11">
                <h1 class="text-center">Mes annonces</h1>
            </div>
            <div class="col-1">
                <p> <?= $_SESSION["username"]; ?>  </p>
            </div>
        </div>
        <div>
            <?php if (isset($_SESSION["connected"]) && $_SESSION["connected"] === true) { ?>
                <form action="logout.php" method="POST">
                    <input type="submit" name="logout" id="logout"  value="Se déconnecter" class="btn btn-primary mt-3" style="float: right;"/>
                </form>
            <?php } ?>
        </div>
        <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col" class="text-center">Titre annonce de location</th>
                        <th scope="col" class="text-center">Supprimer annonce de location</th>
                        <th scope="col" class="text-center">Modifier annonce de location</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($annonces_rent as $annonce):?>
                        <tr>
                            <td> <?= $annonce["title_1"] ?></td>
                            <td>
                                <form method="POST" action="delete_annonce_rent.php">
                                     <input type="hidden" name="id" value="<?= $annonce["id"]?>"> 
                                    <button type="submit" name="submit" class="btn btn-danger">Supprimer</button> 
                                </form>
                            </td>
                            <td> 
                                <form method="POST" action="update_annonce_rent.php">
                                    <input type="hidden" name="id" value="<?= $annonce["id"]?>"> 
                                    <button type="submit" name="submit" class="btn btn-warning">Modifier</button> 
                                </form>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div><br>

        <div class="row">
            <div class="col-6">
                <form action="add_rent.php" method="POST">
                    <h5>Créer une annonce de location :</h5><br>
                    <div class="mt-3">
                        <label for="title_1">Titre de l'annonce</label>
                        <input  class="form-control" type="text" id="title_1" name="title_1" placeholder="Mon Annonce" required>
                    </div> 
                    <div class="mt-3">
                        <label for="image_1">Image de l'annonce</label>
                        <input class="form-control" type="file" id="image_1" name="image_1" placeholder="photo.jpeg" required>
                    </div>
                    <div class="mt-3">
                        <label for="content_1">Contenu de l'annonce</label>
                        <textarea class="form-control" id="content_1" name="content_1" placeholder="Contenu" required>
                        </textarea> 
                    </div>
                    <div class="mt-3">
                        <label for="space_1">Metres carrés</label>
                        <input class="form-control" type="number" id="space_1" name="space_1" placeholder="Metres carrés" required  >
                    </div>
                    <div class="mt-3">
                        <label for="price_1">Prix</label>
                        <input class="form-control" type="number" id="price_1" name="price_1" placeholder="Prix" required  >
                    </div>
                    <div class="mt-3">
                    <button type="submit" name="submit" class="btn btn-primary ">Envoyer</button>
                    </div>
                </form>
            </div>

            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col" class="text-center">Titre annonce de vente</th>
                        <th scope="col" class="text-center">Supprimer annonce de vente</th>
                        <th scope="col" class="text-center">Modifier annonce de vente</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($annonces_sale as $annonce):?>
                        <tr>
                            <td> <?= $annonce["title_2"] ?></td>
                                <form method="POST" action="delete_annonce_sale.php">
                                     <input type="hidden" name="id" value="<?= $annonce["id"]?>"> 
                                    <button type="submit" name="submit" class="btn btn-danger">Supprimer</button> 
                                </form>
                            </td>
                            <td> 
                                <form method="POST" action="update_annonce_sale.php">
                                    <input type="hidden" name="id" value="<?= $annonce["id"]?>"> 
                                    <button type="submit" name="submit" class="btn btn-warning">Modifier</button> 
                                </form>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div><br>

            <div class="row">
            <div class="col-6">
                <form action="add_sale.php" method="POST">
                    <br><h5>Créer une annonce de vente :</h5><br>
                    <div class="mt-3">
                        <label for="title_2">Titre de l'annonce</label>
                        <input  class="form-control" type="text" id="title_2" name="title_2" placeholder="Mon Annonce" required>
                    </div> 
                    <div class="mt-3">
                        <label for="image_2">Image de l'annonce</label>
                        <input class="form-control" type="file" id="image_2" name="image_2" placeholder="photo.jpeg" required>
                    </div>
                    <div class="mt-3">
                        <label for="content_2">Contenu de l'annonce</label>
                        <textarea class="form-control" id="content_2" name="content_2" placeholder="Contenu" required>
                        </textarea>
                    </div>
                    <div class="mt-3">
                        <label for="space_2">Metres carrés</label>
                        <input class="form-control" type="number" id="space_2" name="space_2" placeholder="Metres carrés" required  >
                    </div>
                    <div class="mt-3">
                        <label for="price_2">Prix</label>
                        <input class="form-control" type="number" id="price_2" name="price_2" placeholder="Prix" required  >
                    </div>
                    <div class="mt-3">
                    <button type="submit" name="submit" class="btn btn-primary ">Envoyer</button>
                    </div>
                   
                </form>
            </div>
           
        </div>
    </div>

    <br><footer>
            <nav>
                <ul>
                    <li>&copy; 2025 &mdash; Brocéliande Immobilier</li>
                    <li><a href="legal.php">Mentions Légales</a></li>
                </ul>
            </nav> 
    </footer>
      
               
                
    
</body>
</html>