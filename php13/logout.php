<?php
session_start();

//session_destroy();

if (isset($_SESSION['session_id'])) {
    unset($_SESSION['session_id']);
}

header('Location: index.php');
exit;