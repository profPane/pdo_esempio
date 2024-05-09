<?php
require_once "../db/connDB.php";

$sql = 'SELECT nome, prezzo FROM mariadb.prodotti';
$result = $pdo ->query($sql);

//echo $result;

foreach ($result as $prodotto) {
    if ($prodotto['prezzo']<8)
        echo "<span style='background-color: green; font-weight: bold;'>";
    else
        echo "<span style='background-color: red; font-weight: bold;'>";

    echo $prodotto['nome'] . "</span> " . $prodotto['prezzo'] . "<br />";
}