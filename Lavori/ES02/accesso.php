<?php
$username = $_POST['username'];
$passwd = $_POST['password'];


if($username=="Leonardo" && $passwd=="21") {
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
  <h4>Pagina di Accesso</h4>
  
  <?=$msg?>

</body>
</html>
