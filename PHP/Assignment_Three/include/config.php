<?php
    // define connection information
    define("DB_HOST", "172.31.22.43");
    define("DB_NAME", "Matthew200618886");
    define("DB_USER", "Matthew200618886");
    define("DB_PASS", "CPXfW8aavm"); 
    try{
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        // set PDO error mode to exception debugging
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        // if connection fails stop the script display the error
        die("Connection failed: " . $e->getMessage());
    }
?>