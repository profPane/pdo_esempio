<?php
try{
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=mariadb", "mariadb", "mariadb");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERRORE: Impossibile stabilire una connessione al database");
}