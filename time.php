<?php
include("connect.php");
$title=$sdate=$edate="";
if(isset($_POST['submit'])){
    $title=$_POST['title'];
    $sdate=$_POST['stime'];
    $edate=$_POST['etime'];
    $temp="select * from votetime";
    $temp2=$conn->prepare($temp);
    $temp2->execute();
    $temp3=$temp2->fetch(PDO :: FETCH_ASSOC);
       
    if($temp3){
      echo "
      <script>
      alert('already exsit')
      </script>";
    }
    else{
       $sql="insert into votetime(title,stime,etime)value('$title','$sdate','$edate')";
       $stmt=$conn->prepare($sql);
       $stmt->execute();
       echo "
      <script>
      alert('timing update successful')
      </script>";
    }
  }
  if(isset($_POST['reset'])){
      $sql2="delete  from  votetime";
       $stmt2=$conn->prepare($sql2);
       $stmt2->execute();
       echo "
      <script>
      alert('Enter timing');
      </script>";
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
        height:440px;
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
     .footer{
        text-align:center;
        padding-bottom:40px;
        letter-spacing: 30px;
    }
    </style>
</head>
<body>
<h1 class="header"> Set Election</h1>

    <div class="main">
    <form action="" method="POST">
        <table >
            <tbody>
            <tr><td>Election title :</td>
        <td><input type='text' placeholder='Enter title' name='title'></td></tr>
    <tr><td>Election starting timing: </td><td><input type='datetime-local' placeholder='Enter timing' name='stime'></td></tr>
    <tr><td>Election ending timing:</td><td><input type='datetime-local' placeholder='enter timing' name='etime'></td></tr>
    </tbody>
     </table>
     <div class="footer">
    <input type="submit" value="submit" name="submit"> 
    <input type="submit" value="reset" name="reset">
   
</div>
    </form>
</div>
 
</body>
</html>