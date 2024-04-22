<?php
    require_once "../db/connDB.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        if (isset($_POST['register'])) {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $isUsernameValid = filter_var(
                $username,
                FILTER_VALIDATE_REGEXP, [
                    "options" => [
                        "regexp" => "/^[a-z\d_]{3,20}$/i"
                    ]
                ]
            );
            $pwdLenght = mb_strlen($password);
            
            if (empty($username) || empty($password)) {
                $msg = 'Compila tutti i campi %s';
            } elseif (false === $isUsernameValid) {
                $msg = 'Lo username non è valido. Sono ammessi solamente caratteri 
                        alfanumerici e l\'underscore. Lunghezza minina 3 caratteri.
                        Lunghezza massima 20 caratteri<br /><a href="'.$_SERVER['PHP_SELF'].'">riprova il login</a>';
            } elseif ($pwdLenght < 8 || $pwdLenght > 20) {
                $msg = 'Lunghezza minima password 8 caratteri. Lunghezza massima 20 caratteri<br /><a href="'.$_SERVER['PHP_SELF'].'">riprova il login</a>';
            } else {
                $password_hash = password_hash($password, PASSWORD_BCRYPT);

                $query = "
                    SELECT id
                    FROM users
                    WHERE username = :username
                ";
                
                $check = $connDB->prepare($query);
                $check->bindParam(':username', $username, PDO::PARAM_STR);
                $check->execute();
                
                $user = $check->fetchAll(PDO::FETCH_ASSOC);
                
                if (count($user) > 0) {
                    $msg = 'Username già in uso %s';
                } else {
                    $query = "
                        INSERT INTO users
                        VALUES (0, :username, :password)
                    ";
                
                    $check = $connDB->prepare($query);
                    $check->bindParam(':username', $username, PDO::PARAM_STR);
                    $check->bindParam(':password', $password_hash, PDO::PARAM_STR);
                    $check->execute();
                    
                    if ($check->rowCount() > 0) {
                        $msg = 'Registrazione eseguita con successo';
                    } else {
                        $msg = 'Problemi con l\'inserimento dei dati %s <br /><a href="'.$_SERVER['PHP_SELF'].'">riprova il login</a>';
                    }
                }
            }
        printf($msg);
    }
} else {
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registrazione</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <h1>Registrazione</h1>
            <input type="text" id="username" placeholder="Username" name="username" maxlength="50" required>
            <input type="password" id="password" placeholder="Password" name="password" required>
            <button type="submit" name="register">Registrati</button>
        </form>
    </body>
</html>

<?php 
}
?>