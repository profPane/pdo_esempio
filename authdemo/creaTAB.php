<?php
require_once "../db/connDB.php";

$sql = "CREATE TABLE `users` (
    `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `username` varchar(50) NOT NULL,
    `password` varchar(255) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `username` (`username`)
)";

try {
    $result = $connDB->exec($sql);
    echo "Tabella creata con successo";
} catch (Exception $e) {
    echo "Errore nella creazione del DB1 <br />";
    echo $e;
}