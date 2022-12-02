<?php
session_start();
include("connect.php");
   $_rollno=$password="";
   if(isset($_POST["submit"])){
    $_rollno=$_POST["rollno"];
    $_password=$_POST["password"];
    $sql="select name from voter where roll_no=$_rollno and password='$_password'";
    $result=$conn->query($sql);
    $rows=$result->fetchcolumn();
    echo $rows;
    
    if($rows){
        $_SESSION['rollno']=$_rollno;
        echo "<script>
        alert('login successful');
        window.location='./dashboard.php';
        </script>";
    }
    else{
        echo "<script>
        alert('voter not found');
        </script>";
    }
   }
?>


<!DOCTYPE html>
<head>
    <style>
    .header{
       text-align:center;
       background-color: blue;
       color:white;
       padding:30px;
       margin:0px;
    }
    .main{
        background-image:url('https://www.iitg.ac.in/storage/gallery/1/853616027.jpg');
        height:600px;
        margin:0px;
    }
    table{
        margin:auto;
        line-height:60px;
        padding:60px;
        font-size:larger;
        padding-bottom:20px;
    }
    form{
        background-color:white;
        width:50%;
        margin:auto;
    }
    form .footer{
        text-align:center;
        padding-bottom:40px;
    }
    </style>
</head>
<body>
    <h1 class="header"> login for voting</h1>
    <div class="main">
    <form action="" method="POST">
        <table >
        <tbody>
        <tr><td>Roll no</td>
        <td><input type="number" placeholder="roll no" name="rollno"></td></tr>
    <tr><td>Password</td><td><input type="password" placeholder="password" name="password"><td></tr>
    </tbody>
     </table>
     <div class="footer">
    <input type="submit" value="submit" name="submit"><br><br> 
    Sign up ? <a href="./voter_reg.php">  Registartion here</a>
</div>
    </form>
</div>
</body>