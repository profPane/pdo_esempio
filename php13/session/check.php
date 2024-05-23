<?php
if (isset($_SESSION['session_id'])) {
    $session_user = htmlspecialchars($_SESSION['session_user'], ENT_QUOTES, 'UTF-8');
    $session_id = htmlspecialchars($_SESSION['session_id']);
    $power = $_SESSION['power'];
} else {
    http_response_code(403);
    die('Forbidden. <br />Effettua il login per accedere in area riservata"<br /><a href="login.php">login</a>');
}