<?php
$conn = mysqli_connect($localhost, $ES05_user, $mia_password, $ES05);

// Inizializzazione delle variabili
$html = "";
$title = "Login";

// Verifica connessione
if (!$conn) {
    $title = "Errore di Connessione";
    $html .= "<p>Errore di connessione al database: " . mysqli_connect_error() . "</p>";
} else {
    // Controlla se il form è stato inviato
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"] ?? "";
        $password = $_POST["password"] ?? "";

        // ATTENZIONE: questo esempio usa query SQL dirette (non sicure per produzione)
        $query = "SELECT * FROM utenti WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $title = "Accesso Riuscito";
            $html .= "<p>Benvenuto, $username </p>";
        } else {
            $title = "Credenziali Errate";
            $html .= "<p>Nome utente o password errati.</p>";
            $html .= '<p><a href="' . $_SERVER['PHP_SELF'] . '">Riprova</a></p>';
        }
    } else {
        // Mostra il form se non è stato inviato
        $html .= '
            <form method="post">
                <label for="username">Username:</label><br>
                <input type="text" name="username" id="username" required><br>
                <label for="password">Password:</label><br>
                <input type="password" name="password" id="password" required><br><br>
                <input type="submit" value="Accedi">
            </form>
        ';
    }

    // Chiudi la connessione
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($title); ?></title>
</head>
<body>
    <h1><?php echo htmlspecialchars($title); ?></h1>
    <?php echo $html; ?>
</body>
</html>
<?php>

// Creo il codice html da visualizzare a seconda dei valori di $from e $retval
  $html_out = "<p class='error'>$errmsg</p>";
  $html_out .= $html_form;
  $html_out .= "Non hai un account? <a href='register.php'>Registrati adesso</a>.<br />";
  $html_out .= "Hai dimenticato la password? <a href='pwd_reset.php'>Resetta la password</a>.<br />";
  $html_out .= "<a href='index.php'>Torna alla Home Page</a>.<br />";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <h2>Pagina di login</h2>
  <?=$html_out?>
</body>
</html>
