<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'ES05_user');
define('DB_PASSWORD', 'mia_password');
define('DB_NAME', 'ES05');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

{
    if (!$conn) {
    $html_out = "Attenzione! Connessione al database fallita." . mysqli_connect_error();
}
$html_out = "Connessione al database riuscita.";
}

// Recupero dati dal form
$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);

// Cerca utente nel database
$sql = "SELECT * FROM utenti WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Benvenuto, $username!";
} else {
    // Inserisce nuovo utente
    $insert = "INSERT INTO utenti (username, password) VALUES ('$username', '$password')";
    if ($conn->query($insert) === TRUE) {
        echo "Registrazione completata. Benvenuto, $username!";
    } else {
        echo "Errore nella registrazione: " . $conn->error;
    }


$conn->close();
}
?>