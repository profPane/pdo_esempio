<?php
session_start();
if (isset($_SESSION['session_id'])) {
    $session_user = htmlspecialchars($_SESSION['session_user'], ENT_QUOTES, 'UTF-8');
    $session_id = htmlspecialchars($_SESSION['session_id']);
    $session_power = $_SESSION['power'];
    printf("Benvenuto %s, il tuo session ID è %s", $session_user, $session_id);
    if ($session_power>7) printf("<br><b>Complimenti sei un Super User!</b><br>");
    echo "<br>";
?>
<html>
<head>
</head>
<body>
Questo è il contenuto della pagina riservata<br />
<img src="https://images2.corriereobjects.it/methode_image/2018/11/03/Scienze/Foto%20Scienze%20-%20Trattate/1019960662561382401-png__700-kgDD-U43050152811743x7H-590x445@Corriere-Web-Sezioni.jpg?v=201811181010" alt="Girl in a jacket" width="500" height="400">
</body>
<?php
    printf("%s", '<br /><a href="logout.php">logout</a>');
} else {
    printf("<br />Effettua il %s per accedere all'area riservata", '<a href="login.php">login</a>');
}
