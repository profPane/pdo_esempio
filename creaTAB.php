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

$sql = "CREATE TABLE `mariadb`.`prodotti2` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(300) NOT NULL,
    `prezzo` ZECIMAL(6,2) NOT NULL,
    PRIMARY KEY (`id`)
)";

$result = $pdo->exec($sql);

if ($result!=null) {
    echo "Tabella creata con successo";
} else {
    echo "Tabella non creata";
}