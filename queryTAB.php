<?php
$pdo = null;
$result = null;
try{
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=mariadb", "mariadb", "mariadb");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERRORE: Impossibile stabilire una connessione al database");
}

$sql = 'INSERT INTO prodotti (nome, prezzo) VALUES ("sapone liquido 100ml", 8.50)';
$affectedRows = $pdo->exec($sql);

echo $affectedRows."<br />";

$sql = 'INSERT INTO prodotti (nome, prezzo) VALUES ("sapone solido 100ml", 8.50)';
$affectedRows = $pdo->exec($sql);

echo $affectedRows."<br />";

$sql = 'SELECT nome, prezzo FROM prodotti';
$products = $pdo ->query($sql);

foreach ($products as $product) {
    echo $product['nome'] . " " . $product['prezzo'] . "<br>";
}