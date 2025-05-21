<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'ES05_user');
define('DB_PASSWORD', 'mia_password');
define('DB_NAME', 'ES05');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Si connette al database utilizzando l'estensione MySQL procedurale (mysqli_connect).
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if (!$conn) {
        die("Errore di connessione: " . mysqli_connect_error());
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM utente WHERE username='$username' AND password='$password'";
    $risultato = mysqli_query($conn, $query);

    if (mysqli_num_rows($risultato) > 0) {
        $_SESSION['username'] = $username;
        header("Location: test.php");
    } else {
        echo "Nome utente o password errati.";
    }

    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Accedi</h2>

</body>
</html>
