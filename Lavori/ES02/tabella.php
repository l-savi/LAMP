<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{

    if (isset($_POST['numero'])) 
    {
        $numero = $_POST['numero'];

      
        echo "<h2>Tabella dei Quadrati e dei Cubi</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Numero</th>
                    <th>Quadrato</th>
                    <th>Cubo</th>
                </tr>";
