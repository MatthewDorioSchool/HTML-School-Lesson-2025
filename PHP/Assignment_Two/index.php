<?php
    require_once "config.php";
    require_once "Database.php";
    require_once "Post.php";
    // connect to database
    $db = new Database();
    $pdo = $db->getConnection();
    $postModel = new Post($pdo);
    $success = false;
    $error = "";
    // fourm submission
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $CustomerName = trim($_POST["CustomerName"] ?? "");
        $DevlieryAddress  = trim($_POST["DevlieryAddress"] ?? "");
        $PizzaSize = $_POST['PizzaSize'] ?? "";
        $toppingsArray = $_POST["toppings"] ?? [];
        $toppings = implode(",", $toppingsArray);
        $phone = trim($_POST["phone"] ?? "");
        try{
            // saving post
            $postModel->create($CustomerName,$DevlieryAddress,$PizzaSize,$toppings,$phone);
            $success = true;
        }catch(Exception $e){
            $error = "Could not save post. " . $e->getMessage();
        }
    }
    include "templates/header.php";
    include "form.php";
    include "templates/footer.php";

?>