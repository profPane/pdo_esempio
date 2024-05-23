<?php
session_start();
require_once "./session/check.php";

if (isset($_SESSION['session_id'])) {
    printf("Benvenuto %s, il tuo session ID è %s", $session_user, $session_id);
    if ($power>7) printf("<br><b>Complimenti sei un Super User!</b><br>");
    echo "<br>";
?>
<html>
<head>
</head>
<body>
Questo è il contenuto della pagina riservata<br />
<?php if ($power<=7) { ?>
<img src="../img/blob.jpg" alt="Blob" width="500" height="400">
<?php } ?>
</body>
<?php
    printf("%s", '<br /><a href="logout.php">logout</a>');
} else {
    printf("<br />Effettua il %s per accedere all'area riservata", '<a href="login.php">login</a>');
}
