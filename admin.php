<?php
include("connect.php");
$username=$password="";
   if(isset($_POST['submit'])){
     $username=$_POST['username'];
     $password=$_POST['password'];
     if($username=='vikash01043' && $password=='Vikash@123'){
        echo "
        <script>
        alert('login successful');
       window.location='./admin_work.php';
        </script>
        ";
    }
   else{
    echo "
    <script>
    alert('invalid username and password')
    </script>";
  }
}
?>

<!DOCTYPE html>
<html>
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
        padding-bottom:50px;
    }
    
    </style>
</head>
<body>
<h1 class="header"> Set Election</h1>
<div class="main">
    <form action="" method="POST">
        <table >
            <tbody>
            <tr><td>Username :</td>
        <td><input type='text' placeholder='Enter username' name='username'></td></tr>
    <tr><td>Password: </td><td><input type='password' placeholder='Enter username' name='password'></td></tr>
    
    </tbody>
     </table>
     <div class="footer">
    <input class="sbmt" type="submit" value="submit" name="submit"> 
    </div>
</form>
</div>
</body>
</html>