<?php

//all this database has in this time is our connection
//using the data provided by cstech

try {
    $conexion= new PDO('mysql:host=172.31.22.43;dbname=Susana200553998','Susana200553998','rMjlp8c8Qy');
    // set the PDO error mode to exception
    $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "<p>Connection Failed: ". $e->getMessage();
}




?>

