<?php
require_once "../db/connDB.php";


$sql = 'INSERT INTO prodotti (nome, prezzo) VALUES ("sapone liquido 100ml", 8.50)';
$result = $connDB->exec($sql);

echo $result."<br />";

$sql = 'INSERT INTO prodotti (nome, prezzo) VALUES ("sapone solido 100ml", 5.50)';
$result = $connDB->exec($sql);

echo $result."<br />";