<?php
session_start();

function signup(PDO $pdo,string $username,string $mail,string $pass){
    $hachedPass = password_hash($pass,PASSWORD_DEFAULT);
    $sql_request = "INSERT INTO users (username,mail,pass) VALUES(?,?,?)";
    $prepareStatement = $pdo->prepare($sql_request);
    
    $result = $prepareStatement->execute([$username,$mail,$hachedPass]);
    if($result){
        $lastId = $pdo->lastInsertId();
        $user = get_user_by_id($pdo,$lastId);
        $_SESSION["id"] = $lastId;
        $_SESSION["username"] = $user["username"];
        $_SESSION["mail"] = $user["mail"];
    }
    
    return $result;
      
 }

 function send_contact(PDO $pdo, string $firstname, string $lastname, string $mail, $tel, string $content){
    $sql_request = "INSERT INTO formulaire_contact (firstname,lastname,mail,tel,content) VALUES(?,?,?,?,?)";
    $prepareStatement = $pdo->prepare($sql_request);
    $result = $prepareStatement->execute([$firstname,$lastname,$mail,$tel,$content]);
  
    return $result;

}

 function signin($pdo,$mail,$pass){
    $user = get_user_by_mail($pdo, $mail);
    if(password_verify($pass,$user["pass"])){
        $_SESSION["id"] = $user["id"]; 
        $_SESSION["username"] = $user["username"];
        $_SESSION["mail"] = $user["mail"];
        $_SESSION["connected"] = true;
        return true;
    }
    return null;  

 }

 function get_user_by_mail(PDO $pdo,string $mail){
    $sql_request = "SELECT * FROM users WHERE mail = ?";
    $prepareStatement  = $pdo->prepare($sql_request);

    if ($prepareStatement->execute([$mail])) {
        $data = $prepareStatement->fetch(PDO::FETCH_ASSOC);
        return $data ?: null;
    }

    return null;
 }

 function get_user_by_id(PDO $pdo,string $id){
    $sql_request = "SELECT * FROM users WHERE id = ?";
    $prepareStatement  = $pdo->prepare($sql_request);

    if ($prepareStatement->execute([$id])) {
        $data = $prepareStatement->fetch(PDO::FETCH_ASSOC);
        return $data ?: null;
    }

    return null;
 }

function get_all_annonces_rent(PDO $pdo) :array{
    $sql_query = "SELECT * FROM annonces_rent";
    $statement =  $pdo->query($sql_query); 
    return $data = $statement->fetchAll();
   
}
function get_all_annonces_sale(PDO $pdo) :array{
    $sql_query = "SELECT * FROM annonces_sale";
    $statement =  $pdo->query($sql_query); 
    return $data = $statement->fetchAll();
   
}
function get_all_annonces(PDO $pdo) :array{
    $sql_query = "SELECT * FROM annonces_rent";
    $sql_query_2 = "SELECT * FROM annonces_sale";
    $statement =  $pdo->query($sql_query, $sql_query_2); 
    return $data = $statement->fetchAll();
   
}


function get_all_annonces_rent_by_user_id(PDO $pdo,int $user_id) :array{
        try {
            $sql = "SELECT * FROM annonces_rent WHERE user_id = :user_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur SQL : " . $e->getMessage());
        }
    }
    function get_all_annonces_sale_by_user_id(PDO $pdo,int $user_id) :array{
        try {
            $sql = "SELECT * FROM annonces_sale WHERE user_id = :user_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur SQL : " . $e->getMessage());
        }
    }


function get_one_annonce_rent(PDO $pdo,int $id){
    $sql_request = "SELECT * FROM annonces_rent WHERE id = ?";
    $prepareStatement  = $pdo->prepare($sql_request);

    if ($prepareStatement->execute([$id])) {
        $data = $prepareStatement->fetch(PDO::FETCH_ASSOC);
        return $data; 
    }else{
        return null;
    }
}
function get_one_annonce_sale(PDO $pdo,int $id){
    $sql_request = "SELECT * FROM annonces_sale WHERE id = ?";
    $prepareStatement  = $pdo->prepare($sql_request);

    if ($prepareStatement->execute([$id])) {
        $data = $prepareStatement->fetch(PDO::FETCH_ASSOC);
        return $data; 
    }else{
        return null;
    }
}

function create_rent(PDO $pdo, string $title_1, string $content_1, $image_1, float $space_1, float $price_1){
    $user_id = $_SESSION["id"];
    $sql_request = "INSERT INTO annonces_rent (title_1,image_1,content_1,space_1,price_1,user_id) VALUES(?,?,?,?,?,?)";
    $prepareStatement = $pdo->prepare($sql_request);
    $result = $prepareStatement->execute([$title_1,$content_1,$image_1,$space_1,$price_1,$user_id]);
     
    return $result;

}
function create_sale(PDO $pdo, string $title_2, string $content_2, $image_2, float $space_2, float $price_2){
    $user_id = $_SESSION["id"];
    $sql_request = "INSERT INTO annonces_sale (title_2,content_2,image_2,space_2,price_2,user_id) VALUES(?,?,?,?,?,?)";
    $prepareStatement = $pdo->prepare($sql_request);
    $result = $prepareStatement->execute([$title_2,$content_2,$image_2,$space_2,$price_2,$user_id]);
     
    return $result;
}

function update_annonce_rent(PDO $pdo,int $id,string $title_1, string $content_1, $image_1, float $space_1, float $price_1){
    $sql_request = "UPDATE annonces_rent SET title_1 =?, image_1 =?, content_1 =?, space_1 =?, price_1 =? WHERE id =?";
    $prepareStatement = $pdo->prepare($sql_request);
    $result = $prepareStatement->execute([$title_1,$content_1,$image_1,$space_1,$price_1,$id]);
    return $result;
}
function update_annonce_sale(PDO $pdo,int $id,string $title_2, string $content_2, $image_2, float $space_2, float $price_2){
    $sql_request = "UPDATE annonces_sale SET title_2 =?, content_2 =?,image_2 =?, space_2 =? price_2 =? WHERE id =?";
    $prepareStatement = $pdo->prepare($sql_request);
    $result = $prepareStatement->execute([$title_2,$content_2,$image_2,$space_2,$price_2,$id]);
    return $result;
}

function delete_annonce_rent(PDO $pdo, int $annonce_id){
    $user_id = $_SESSION["id"];
    $sql_request = "DELETE FROM annonces_rent WHERE id =?";
    $prepareStatement = $pdo->prepare($sql_request);
    $result = $prepareStatement->execute([$annonce_id]);
    return $result;
}
function delete_annonce_sale(PDO $pdo, int $annonce_id){
    $user_id = $_SESSION["id"];
    $sql_request = "DELETE FROM annonces_sale WHERE id =?";
    $prepareStatement = $pdo->prepare($sql_request);
    $result = $prepareStatement->execute([$annonce_id]);
    return $result;
}

function session_verify(){
    if(isset($_SESSION["username"]) && empty($_SESSION["username"]) ){
        header('Location: homepage.php');
    }
}
