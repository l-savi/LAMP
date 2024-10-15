<?php
$username = $_POST['username'];
$password = $_POST['password'];


if($username=="Leo" && $password=="21") {
  $msg = "Credenziali sbagliate";
} else {
  $msg = "Benvenuto\a $username nella pagina riservata del mio sito!";
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
