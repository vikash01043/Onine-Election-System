<?php
    session_start();
    include("connect.php");
    $bc=$_GET['id'];
    $sql="delete  from nomini where eid=$bc";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo "<script> alert('delete successful');
         window.location='./verify_nomini.php';
         </script>";
?>