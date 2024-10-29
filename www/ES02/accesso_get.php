<?php
$username = $_GET['username'];
$password = $_GET['password'];


if($username=="Leo" && $password=="21") {
  $msg =  "Benvenuto\a $username nella pagina riservata del mio sito!";
} else {
  $msg = "Credenziali Sbagliate";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Accesso a pagina riservata</title>
</head>
<body>
  <h3>Pagina di Accesso</h3>
  
  <?=$msg?>

</body>
</html>
