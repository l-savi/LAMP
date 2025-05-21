<?php
// Avvio la sessione php per recuperare eventuali dati di sessione
session_start();

// Verifica se l'utente è autenticato
$utente = $_SESSION['username'] ?? 'Ospite';

// Creazione dei link in funzione dell'utente Ospite o Autenticato 
$html_link .= '<a href="login.php">Pagina Login</a>';
$html_link2 .= '<a href="test.php">Pagina Riservata</a>';
 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Accedi</h2>
    <form method="POST" action="login.php">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Accedi">
    </form>
</body>
</html>
