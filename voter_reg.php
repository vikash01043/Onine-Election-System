<?PHP
 include('connect.php');
    $name=$rollno=$email=$password=$cpassword=$depar="";
        $GLOBALS['err']="";
        if(isset($_POST['submit'])){
            $name=test_input($_POST["name"]);
            $rollno=test_input($_POST["rollno"]);
            $email=test_input($_POST["email"]);
            $password=test_input($_POST["password"]);
            $cpassword=test_input($_POST["cpassword"]);
            $depar=test_input($_POST["depar"]);

            test_name($name);
            test_email($email);
            test_password($password);
            test_cpassword($cpassword,$password);

            if($GLOBALS['err']==""){
               $query = "INSERT INTO voter (name,roll_no,email,password,status,department)VALUES ('$name',$rollno,'$email','$password',0,'$depar')";
               $sql=$conn->prepare($query);
              if($query){
                 $sql->execute();
              }
              else{
                echo "error in insertion";
              }
              echo "<script>
                      alert('your registration is successful');
                  </script>";
            }
            else {
              echo "<script> alert('". $GLOBALS['err']."')</script>" ;
            }
        }
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    function test_name($data){
      if(!preg_match("/^[a-zA-Z]*$/",$data)){
        $GLOBALS['err']="Invalid Frist Name";
      $name="";
      }
    }
    
    function test_email($data){
      if($GLOBALS['err']=="" && !preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$data) && empty($data)){
        $GLOBALS['err']="Invalid Email";
        $email="";
      }
    }
    function test_password($data){
      $uppercase = preg_match('@[A-Z]@', $data);
      $lowercase = preg_match('@[a-z]@', $data);
      $number    = preg_match('@[0-9]@', $data);
      $specialchars = preg_match('@[^\w]@', $data);
      if($GLOBALS['err']==""){
        if(strlen($data)<8){
          $GLOBALS['err']="Password must be of more than length 8";
        }else if(!$uppercase){
          $GLOBALS['err']="Password must have a capital letter";
        }else if(!$lowercase){
          $GLOBALS['err']="Password must have a lowercase letter";
        }else if(!$number){
          $GLOBALS['err']="Password must have a number";
        }else if(!$specialchars){
          $GLOBALS['err']="Password must have a special character";
        }
      }
    }
    function test_cpassword($data1,$data2){
      if($GLOBALS['err']=="" && !($data1===$data2)){
        $GLOBALS['err']="password not matching -re enter password";
      }
    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
</head>
<style>
    .header{
            text-align:center;
            background-color:blue;
            color:white;
            padding:25px;
            margin:0px;
        }
        .main{
            text-align:center;
            border:1px solid black;
            background-color:white;
            background-image:url('https://www.iitg.ac.in/storage/gallery/1/853616027.jpg');
            padding:0px;
            line-height:25px;
            height:600px;
            font-size:larger;
        }
        table{
            margin:auto;
            line-height: 50px;
            color:royalblue;
            /* background-color:white; */
            padding:50px;
            padding-bottom:0px;
            /* margin-top:0px; */
        }
        form{
            background-color:white;
            width:40%;
            margin:auto;
        }
        .sbmt{
            text-align:center;
        padding-bottom:40px;
        }
</style>
<body>
    <h1 class="header">Registration for voting </h1>
    <div class="main">
        <form action="" method="POST" >
        <table >
        <tbody>

         <tr><td>Name:</td><td>
        <input type="text" placeholder="name" name="name"></td></tr>

        <tr><td>Roll No:</td><td><input type="number" placeholder="rollno" name="rollno">
        </td></tr>

       <tr><td>Email:</td><td>
        <input type="text" placeholder="Enter Email" name="email"></td></tr>

       <tr><td>Password:</td><td>
       <input type="password" placeholder="Enter password" name="password"></td></tr>

        <tr><td>Confirm password:</td><td>
        <input type="password" placeholder="Enter confirm password" name="cpassword">
        </td></tr>

       <tr><td>Department:</td>
      <td> <input type="text" placeholder="department" name="depar"></td></tr>
      </tbody>
      </table>
    <div class="sbmt">
    <input type="submit" name="submit" value="submit"><br><br>
    </form>
    Already user ?<a href="./voter_login.php"> login here</a>
    </div>
    </div> 
</body>
</html>