<!DOCTYPE html>

<head>
    <title>Document</title>
</head>
<body>
    <h2>Richiesta credenziali per entrare</h2>

    <form action ="login.php" method="POST"></form>
    <input type="text" name = "name">
    <input type="password" name="password"><br>
    <input type= "submit" value= "submit">                                                                                   

</body>
</html>
 <?php                                            //php in html
    $username=$_POST["name"];
    $password=$_POST["password"];

    if($username=="Leonardo"&& $password=="21"){
        $smg="Benvenuto" $username nella pagina 
    }

    else{ 
        $smg="inserire altre credenziali";
    }