<?php
require_once "connDB.php";

$sql = "CREATE DATABASE DB1;";

try {
    $result = $connDB->exec($sql);
    echo "Database creato con successo";
} catch (Exception $e) {
    echo "Errore nella creazione del DB1 <br />";
    echo $e;
}