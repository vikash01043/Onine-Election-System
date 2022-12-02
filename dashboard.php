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
        background-repeat: no-repeat;
        background-size:cover;
        margin:0px;
    }
    table{
        text-align:center;
        background-color:white;
        table-layout: fixed;
        width: 1300px;  
        margin:auto;
        border-spacing: 0 15px;
        font-size:larger;
        font-weight: bold;
    }
  </style>
</head>
<body>
    


<?php
session_start();
  include("connect.php");
  $data="select eid,name,photo,discrip from nomini";
  $result=$conn->query($data);
  $roll= $_SESSION['rollno'];
  $sql="select status from voter where roll_no='$roll'";
  $stmt=$conn->query($sql);
  $user=$stmt->fetch(PDO :: FETCH_ASSOC);
  $sql2="select * from votetime ";
   $stmt2=$conn->query($sql2);
   $time=$stmt2->fetch(PDO :: FETCH_ASSOC);
   $title=$time['title'];
  echo "<h1 class='header'> Nominies of ".  $title."</h1>";
   $t1=$time['stime'];
   $t2=$time['etime'];
   $now = new DateTime();
   $n=$now->format('Y-m-d H:i:s') ;
   if($t1>$n){
      echo "<script>
      alert('voting is not started');
      window.location='./voter_login.php';
      </script>";
    }
    else if($t2<$n){
      echo "<script>
      alert('voting time is over');
      window.location='./voter_login.php';
      </script>";
    }
    else{
            if($user['status']==0){ 
              echo " <div class='main'><table style='width:100%'>
             <thead>
             <tr><td style='width:10%'> Eid</td>
             <td style='width:10%'> Name </td>
             <td style='width:25%'> Photo </td>
             <td style='width:40%'> Discription </td>
             <td style='width:15%'> Vote </td>
             </thead>
             <tbody>
             ";     
                while($row = $result->fetch()){
                echo "<tr> <td>";
                 echo $row['eid'];
                 echo "</td> ";
                 $_ab=$row['eid'];
                 echo "<td>  ";
                 echo $row['name'];
                 echo "</td><td>  ";
                 echo '<img style="height:200px; width:200px;" src="data:image/jpeg;base64,'.base64_encode( $row['photo'] ).'"/>';
                 echo "</td><td>";
                 echo "<div style='border:1px solid black'>";
                 echo $row['discrip'];
                 echo "</div>";
                 echo "</td>";
                 echo "
                 <form action='./voting.php?id=$_ab' method='POST'>";
                 $_SESSION['id']=$row['eid'];
                 echo "<td>";
                 echo "<button style='color:red' ><b> vote</b> </button>
                 </form></td> </tr>
                 ";
                }
                echo "</tbody>
                </table> </div>";
           }   
            else {
                  echo "<script>
                   alert('you already voted');
                  window.location='./voter_login.php';
                  </script>";
                }
       }
?>
</body>










