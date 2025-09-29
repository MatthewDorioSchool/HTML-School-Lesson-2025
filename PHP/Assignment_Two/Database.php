<?php 
    class Database{
        // Stores Private database information defined from config.php
        private $host = DB_HOST;
        private $db   = DB_NAME;
        private $user = DB_USER;
        private $pass = DB_PASS;
        // This property will hold the PDO object
        private $pdo;
        // Method to return database connection
        public function getConnection(){
            // Check the DSN (Data source name) string with host, and charset
            if($this->pdo === null){
                try{
                    $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";
                    // PDO object creation using username and password
                    $this->pdo = new PDO($dsn, $this->user, $this->pass);
                    // Error expectaions
                    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }catch(PDOException $e){
                    // Error Message
                    die("Attempt to connect to database failed: " . $e->getMessage());
                }
            }
            return $this->pdo;
        }  
    }
?>