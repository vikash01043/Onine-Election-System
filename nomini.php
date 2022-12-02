
 <?PHP
 include('connect.php');
    $name=$rollno=$email=$depar=$cpi=$mobileno=$image=$discrip="";
    $GLOBALS['err']="";
        if(isset($_POST['submit'])){
            $name=test_input($_POST["name"]);
            $rollno=test_input($_POST["rollno"]);
            $email=test_input($_POST["email"]);
           
            $depar=test_input($_POST["depar"]);
            $cpi=test_input($_POST["cpi"]);
            $mobileno=test_input($_POST["mobileno"]);
            $image = $_FILES['photo']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
            $discrip=$_POST['discription'];
             test_name($name);
              
              test_email($email);
              test_cpi($cpi);
              test_mobileno($mobileno);
           if($GLOBALS['err']==""){
            $query = "INSERT INTO nomini (name,email,depar,cpi,noofvote,rollno,mobileno,photo,discrip)
            VALUES ('$name','$email','$depar',$cpi,0,$rollno,'$mobileno','$imgContent','$discrip')";
            $sql=$conn->prepare($query);
            
             
            if($query){
            $sql->execute();
            echo "<script>
            alert('your registration is successful');
            </script>";
            }
            else {
                echo "<script>
                alert('error in insertion');
                </script>";
                }  
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
        $GLOBALS['err']="Invalid Name";
        $name="";
      }
    }
    
function test_email($data){
      if($GLOBALS['err']=="" && !filter_var($data, FILTER_VALIDATE_EMAIL)){
        $GLOBALS['err']="Invalid Email";
        $email="";
      }
    }
    function test_cpi($data){
        if($GLOBALS['err']==""&& is_float($data)){
          $GLOBALS['err']="Invalid cpi";
          $cpi="";
        }
      }
      function test_mobileno($data){
        if($GLOBALS['err']==""&&!preg_match("/^[0-9]*$/", $data)){
          $GLOBALS['err']="Invalid mobile no";
          $mobileno="";
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
            height:590px;
            font-size:larger;

        }
        table{
            margin:auto;
            line-height: 50px;
            color:royalblue;
            background-color:white;
            padding:50px;
            padding-bottom:0px;
            margin-top:0px;
        }
    </style>
</head>

<body>
    <h1 class="header">registration for nomini</h1><hr>
    <div class="main">
    <form action="" method="POST" enctype="multipart/form-data" >
     <table > <tbody>
    <tr><td>Name:</td>
    <td><input type="text" placeholder="Enter name" name="name" required></td>
    </tr>

    <tr><td>Roll No:</td>
    <td> <input type="number" placeholder="Enter rollno" name="rollno" required></td></tr>

   <tr><td>Email:</td>
   <td><input type="text" placeholder="Enter Email" name="email" required></td>
    </tr>

    <tr><td>  Department: </td>
    <td><input type="text" placeholder=" Enter department" name="depar" required></td>
    </tr>
    <tr><td>CPI </td>
    <td><input type="float" placeholder="Enter cpi" name="cpi" reqired></td>
    </tr>

     <tr><td>  Mobile No:</td>
     <td> <input type="text" placeholder="enter mobile no" name="mobileno" required></td>
    </tr>

    <tr><td>Photo :</td><td><input type="file" name="photo" required></td>
     </tr>
     <tr><td>Discription :</td><td><textarea  name="discription" rows="4" cols="50">
      </textarea></td>
     </tr>
        <tr><td><input type="submit" name="submit" value="submit"></td></tr> 
    </table>
    
    </form>
    </div>
    
</body>
</html>