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
        height:600px;
    }
    table{
        text-align:center;
        background-color:white;
        table-layout: fixed;
        width: 1200px;  
        margin:auto;
        border-spacing: 0 15px;
        font-size:larger;
        font-weight: bold;
    }
  </style>
</head>
<body>
  <h1 class="header">Detail of All Nominies </h1>
<?php
include("connect.php");
$data="select eid,name,photo,discrip from nomini";
$result=$conn->query($data);
echo " <div class='main'><table style='width:80%' >
             <tbody>
             <thead>
             <tr><td style='width:10%'> Eid</td>
             <td style='width:10%'> Name </td>
             <td style='width:25%'> Photo </td>
             <td style='width:35%'> Discription </td>
             </thead>
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
                }
                echo "</tbody>
                </table> </div>";
?>
</body>