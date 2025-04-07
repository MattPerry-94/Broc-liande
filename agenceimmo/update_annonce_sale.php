<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Modification annonce de vente</title>
</head>
<body>
<?php
    include_once("functions.php");
    include_once("database.php");
    session_verify(); 
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST["id"]) and
        !empty($_POST["id"] ) ){
            $id = $_POST["id"];
            $annonce = get_one_annonce_sale($pdo,$id);
            if($annonce == null){
            header('Location: admin.php');    
            }
        }
    }
    
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h2>Modification d'une annonce de vente</h2>
            
        </div>
            
        </div>
        <div class="row">
            <div class="col-12">
            <form action="p_update_annonce_sale.php" method="POST">
                    <div class="mt-3">    
                        <input type="hidden" value="<?= $annonce['id'] ?>"  class="form-control"  id="id" name="id" placeholder="Mon Annonce" required>
                    </div>
                    <div class="mt-3">
                        <label for="title">Titre de l'annonce de vente</label>
                        <input value="<?= $annonce['title_2'] ?>"  class="form-control" type="text" id="title_2" name="title_2" placeholder="Mon Annonce" required>
                    </div> 
                    <div class="mt-3">
                        <label for="image">Image de l'annonce de vente</label>
                        <input value="<?= $annonce['image_2'] ?>" class="form-control" type="file" id="image_2" name="image_2" placeholder="photo.jpeg" required>
                    </div>
                    <div class="mt-3">
                        <label for="content">Contenu de l'annonce de vente</label>
                        <textarea class="form-control" id="content_2" name="content_2" placeholder="Contenu" required>
                            <?= $annonce['content_2'] ?>
                        </textarea>
                    </div>
                    <div class="mt-3">
                        <label for="space">Metres carrés du bien de vente</label>
                        <textarea class="form-control" id="space_2" name="space_2" placeholder="m2" required>
                            <?= $annonce['space_2'] ?>
                        </textarea>
                    </div>
                    <div class="mt-3">
                        <label for="price">Prix</label>
                        <input value="<?= $annonce['price_2'] ?>" class="form-control" type="number" id="price_2" name="price_2" placeholder="Prix" required  >
                    </div>
                    <div class="mt-3">
                    <button type="submit" name="submit" class="btn btn-primary ">Confirmer</button>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>
</body>
</html>