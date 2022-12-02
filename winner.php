<!DOCTYPE html>
<head>
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
            padding:40px;
            line-height:25px;
            height:525px;
            font-size:larger;
           
        }
        table{
            margin:auto;
            line-height: 50px;
            color:royalblue;
            background-color:white;
            padding:50px;
            padding-bottom:0px;
            width:1000px;
        }
</style>
</head>
<body>
    <?php
    include("connect.php");
    $sql="select * from nomini n1 where n1.noofvote=(select max(n2.noofvote) from nomini n2);";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $result=$stmt->fetch(PDO :: FETCH_ASSOC);
    ?>
   <h1 class="header"> winner of election </h1>
   <div class="main">
   <table style='width:70%'>
   <thead>
             <td style='width:10%'> Name </td>
             <td style='width:10%'> Department </td>
             <td style='width:10%'> Total vote </td>
             <td style='width:10%'> Mobile No </td>
             <td style='width:30%'> Photo </td>
             </thead>
    <tbody>
        <tr>
            <td> <?php  echo $result['name'] ?></td>
            <td> <?php echo $result['depar'] ?></td>
            <td> <?php echo $result['noofvote']?> </td>
            <td> <?php echo $result['mobileno'] ?></td>
            <td> <img width="300px" height="300px" src="data:image/jpeg;base64,<?php echo base64_encode( $result['photo'] ); ?>" />
            </td>
        </tr>
    </tbody>
   </table>
   </div>
</body>