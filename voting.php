<?php
    session_start();
    include("connect.php");
    $ab=$_SESSION['rollno'];
    $sql="update voter set status='1' where roll_no=$ab";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $bc=$_GET['id'];
    $sql2="update nomini set noofvote=noofvote+1 where eid=$bc";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
    echo "<script> alert('vote is successful');
         window.location='./voter_login.php';
         </script>";
?>