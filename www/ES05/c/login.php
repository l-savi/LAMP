<?php
// Includo il file delle funzioni
include 'functions.php';

// Avvio la sessione php per recuperare eventuali dati di sessione
session_start();

$msg = $_GET['error'] ?? '';

if(isset($_SESSION['username'])) {
    $msg = 'Login già effettuato';
}
else if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    {
        // Connessione al database
        $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
        if (!$conn) {
            die("Connessione fallita: " . mysqli_connect_error());
        }
    
        // Query per selezionare tutti i record dalla tabella users
        $query = "SELECT UserID FROM utente where Username = '$username' and Password = '$password';";
        
    
        // Esecuzione della query
        $result = mysqli_query($conn, $query);
    
        if ($result) {
            // Controllo se ci sono record        
            if (mysqli_num_rows($result) > 0) {    //controllo se equivale a uno, funzione che fa ritornare num di quante righe controllate 
                return [true, 'Login avvenuto con successo'];
            } else {
                return [false, 'Login sbagliato'];
            }
    
            // Reset dei risultati
            mysqli_free_result($result);                  
        } else {
            return [false, 'Errore: ' . mysqli_error($conn)];
        }
    
        // Chiusura della connessione
        mysqli_close($conn);
      }
    
}
?>

<?php
//Form di login
$html_form = <<<FORM
<form action="$_SERVER[PHP_SELF]" method="post">
  <label for="nome"> </label><input type="text" name="username" placeholder="Nome utente" required/><br />
  <label for="password"> </label><input type="password" name="password" placeholder="Password" required/><br />
  <input type="submit" value="Login" /><input type="reset" value="Cancel" />
  <input type="hidden" name="from" value="{$_GET['from']}" />
  <p class='error'>$msg</p>
</form>
FORM;

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
