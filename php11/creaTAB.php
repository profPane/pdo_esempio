<?php
$result=null;

require_once "../db/connDB.php";

$sql = "CREATE TABLE prodotti (
    id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    nome VARCHAR(300) NOT NULL,
    prezzo DECIMAL(6,2) NOT NULL,
    PRIMARY KEY (id)
)";

try {
    $result = $pdo->exec($sql);
    echo "Tabella creata con successo";
} catch (Exception $e) {
    echo "Errore nella creazione della Tabella <br />";
    echo $e;
}