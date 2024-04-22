<?php
session_start();
require_once "../db/connDB.php";

if (isset($_SESSION['session_id'])) {
    header('Location: dashboard.php');
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (empty($username) || empty($password)) {
        $msg = 'Inserisci username e password %s';
    } else {
        $query = "
            SELECT username, password
            FROM users
            WHERE username = :username
        ";
        
        $check = $connDB->prepare($query);
        $check->bindParam(':username', $username, PDO::PARAM_STR);
        $check->execute();
        
        $user = $check->fetch(PDO::FETCH_ASSOC);
        
        if (!$user || password_verify($password, $user['password']) === false) {
            $msg = 'Credenziali utente errate %s';
        } else {
            session_regenerate_id();
            $_SESSION['session_id'] = session_id();
            $_SESSION['session_user'] = $user['username'];
            $_SESSION['livelloUtente'] = //preso dal DB
            //altre informazioni utili sull'utente
            header('Location: dashboard.php');
            exit;
        }
    }
    
    printf($msg, '<a href="'.$_SERVER['PHP_SELF'].'">torna indietro</a>');
} else {
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
            <button type="submit" name="login">Accedi</button>
        </form>
    </body>
</html>
<?php 
} 
?>