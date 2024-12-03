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

  <form action="accesso_get.php" method="GET">

        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <br>
        <input type="submit" value="Accedi">
        <input type="reset" value="Annulla">

    </form>
</body>
</html>
