<?php
session_start();
require_once "./session/check.php";
if (isset($_SESSION['session_id'])) {
    printf("Benvenuto %s, il tuo session ID è %s", $session_user, $session_id);
    echo "<br>";
    printf("%s", '<a href="logout.php">logout</a>');
} else {
    printf("Effettua il %s per accedere all'area riservata", '<a href="../login.html">login</a>');
}