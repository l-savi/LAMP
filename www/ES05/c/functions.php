<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'ES05_user');
define('DB_PASSWORD', 'mia_password');
define('DB_NAME', 'ES05');

function login($username, $password) {
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

  function checkSession()               //Sessione attiva
{
    if (isset($_SESSION['username'])) {         //All'interno di session c'è username
        return [true, 'Sessione attiva'];
    } else {
        return [false, 'Sessione non attiva'];
    }
}

?>
