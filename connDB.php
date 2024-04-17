<?php
$connDB = null;
try{
    $connDB = new pdo("mysql:host=127.0.0.1;", "mariadb", "mariadb");
    // Set the connDB error mode to exception
    $connDB->setAttribute(pdo::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
    //echo "DB OK!<br />";
} catch(Exception $e){
    echo "Errore di accesso al DB";
    die("ERRORE: Impossibile stabilire una connessione al database");
}