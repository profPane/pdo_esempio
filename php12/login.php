<?php
session_start();
require_once "../db/connDB.php";

if (isset($_SESSION['session_id'])) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['login'])) { //arrivo da un modulo
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (empty($username) || empty($password)) {
        $msg = 'Inserisci username e password %s';
    } else {
        $query = "
            SELECT username, password, power
            FROM users
            WHERE username = :username
        ";
        $check = $pdo->prepare($query); //mando la query al pdo
        
        $check->bindParam(':username', $username, PDO::PARAM_STR);
        $check->execute();
        
        $user = $check->fetch(PDO::FETCH_ASSOC);
        
        if (!$user || password_verify($password, $user['password']) === false) {
            $msg = 'Credenziali utente errate %s';
        } else {
            session_regenerate_id();
            $_SESSION['session_id'] = session_id();
            $_SESSION['session_user'] = $user['username'];
            $_SESSION['livelloUtente'] = $user['power']; //livello utente
            //altre informazioni utili sull'utente
            header('Location: index.php');
            exit;
        }
    }
    printf($msg, '<a href="'.$_SERVER['PHP_SELF'].'">torna indietro</a>');
} else { //non arrivo da un modulo
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <h1>Login</h1>
            <input type="text" id="username" placeholder="Username" name="username">
            <input type="password" id="password" placeholder="Password" name="password">
            <span style="float: left"><button type="submit" name="login">Accedi</button></span>
            <span style="float: right"><a href=registra.php>Crea un account</a></span>
            <br />
        </form>
    </body>
</html>
<?php 
} 
?>