<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $mydb="election";
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$mydb", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
?>