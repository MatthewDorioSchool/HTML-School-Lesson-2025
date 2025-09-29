<?php
    //CRUD Functions
class Post{
    private $pdo;
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }
     // Saves post in database
        public function create($CustomerName, $DevlieryAddress, $PizzaSize, $toppings, $phone){
            $sql = "INSERT INTO Pizza_Order (CustomerName, DevlieryAddress, PizzaSize, toppings, phone ) VALUES (:CustomerName, :DevlieryAddress, :PizzaSize, :toppings, :phone )";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ":CustomerName" => $CustomerName,
                ":DevlieryAddress" => $DevlieryAddress,
                ":PizzaSize" => $PizzaSize,
                ":toppings" => $toppings,
                ":phone" => $phone
            ]);
        }
    }
?>