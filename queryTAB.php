<?php
require_once "connDB.php";

$sql = 'SELECT nome, prezzo FROM mariadb.prodotti';
$result = $connDB ->query($sql);

//echo $result;

foreach ($result as $prodotto) {
    if ($prodotto['prezzo']<8)
        echo "<span style='color: green; font-weight: bold;'>";
    else
        echo "<span style='color: red; font-weight: bold;'>";

    echo $prodotto['nome'] . "</span> " . $prodotto['prezzo'] . "<br />";
}