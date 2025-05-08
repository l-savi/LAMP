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
  try{
    [$loginRetval, $loginRetmsg] = login($username, $password);
    
    $msg = $loginRetmsg;
    
    if($loginRetval) {
        $_SESSION['username'] = $username; 

        $link = 'Location: ';
        $link .= $_POST['from'] != null ? $_POST['from'] : 'index.php';

        header($link);
        die();

    }
  }catch(Exception $e){
    $msg = 'Errore durante il login: '. $e->getMessage();
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
