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
        width: 1200px;  
        margin:auto;
        font-size:larger;
        font-weight: bold;
        border-spacing: 0 15px;
    }
  </style>
</head>
<body>
  <h1 class="header">Detail of All Nominies </h1>
<?php
include("connect.php");
$data="select eid,name,cpi,photo,discrip from nomini";
$result=$conn->query($data);
echo " <div class='main'><table style='width:90%' >

            <thead>
             <tr><td style='width:10%'> Eid</td>
             <td style='width:10%'> Name </td>
             <td style='width:10%'> CPI </td>
             <td style='width:25%'> Photo </td>
             <td style='width:25%'> Discription </td>
             <td style='width:10%'> Vote </td>
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
                 echo $row['cpi'];
                 echo "</td><td>  ";
                echo '<img style="height:200px; width:200px;" src="data:image/jpeg;base64,'.base64_encode( $row['photo'] ).'"/>';
                 echo "</td><td>";
                 echo "<div style='border:1px solid black'>";
                 echo $row['discrip'];
                
                 echo "</div>";
                 echo "</td>";
                 echo "
                 <form action='./delete_nomini.php?id=$_ab' method='POST'>";
     
                 $_SESSION['id']=$row['eid'];
                 echo "<td>";
                 echo "<button> Delete</button>
                 </form></td> </tr>
                 ";
                }
                echo "</tbody>
                </table> </div>";
?>
</body>