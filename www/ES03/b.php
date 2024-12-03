<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = trim($_POST['nome']);
    $cognome = trim($_POST['cognome']);
    $dataNascita = trim($_POST['data']);
    $codice_fiscale = strtoupper(trim($_POST['codice_fiscale']));
    $email = trim($_POST['email']);
    $tel = trim($_POST['tel']);
    $via = trim($_POST['via']);
    $nCivico = trim($_POST['nCivico']);
    $cap = trim($_POST['cap']);
    $comune = trim($_POST['comune']);
    $provincia = strtoupper(trim($_POST['provincia']));
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
}

// Validation
$error = '';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error .= 'Email non valida.<br>';
}
if (strpos($username, $nome) || strpos($username, $cognome)) {
    $error .= 'Username non valido.<br>';
}

?>



<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizzazione Dati Utente</title>
</head>
<body>
    <h2>Dati inseriti nel form:</h2>

    <?php
    // Verifica se il form è stato inviato correttamente tramite POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupera i dati inviati dal form senza sanitizzazione
        $nome = isset($_POST['nome']) ? $_POST['nome'] : 'Non fornito';

        $cognome = isset($_POST['cognome']) ? $_POST['cognome'] : 'Non fornito';

        $data_nascita = isset($_POST['data_nascita']) ? $_POST['data_nascita'] : 'Non fornito';

        $codice_fiscale = isset($_POST['codice_fiscale']) ? $_POST['codice_fiscale'] : 'Non fornito';

        $email = isset($_POST['email']) ? $_POST['email'] : 'Non fornita';

        $cellulare = isset($_POST['cellulare']) ? $_POST['cellulare'] : 'Non fornito';

        $via = isset($_POST['via']) ? $_POST['via'] : 'Non fornito';

        $CAP = isset($_POST['CAP']) ? $_POST['CAP'] : 'Non fornito';

        $comune = isset($_POST['comune']) ? $_POST['comune'] : 'Non fornito';

        $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : 'Non fornito';

        $nickname = isset($_POST['nickname']) ? $_POST['nickname'] : 'Non fornito';

        $password = isset($_POST['password']) ? $_POST['password'] : 'Non fornito';

        
        // Visualizzazione dei dati
        echo "<p><strong>Nome:</strong> $nome</p>";
        echo "<p><strong>Cognome:</strong> $cognome</p>";
        echo "<p><strong>Data di nascita:</strong> $data_nascita</p>";
        echo "<p><strong>Codice Fiscale:</strong> $codice_fiscale</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Cellulare:</strong> $cellulare</p>";
        echo "<p><strong>Via:</strong> $via</p>";
        echo "<p><strong>CAP:</strong> $CAP</p>";
        echo "<p><strong>Comune:</strong> $comune</p>";
        echo "<p><strong>Provincia:</strong> $provincia</p>";
        echo "<p><strong>Nickname:</strong> $nickname</p>";
        echo "<p><strong>Password:</strong> $password</p>";

    } else {
        echo "<p>Nessun dato è stato inviato.</p>";
    }
    ?>

</body>
</html>