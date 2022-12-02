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
    .section{
        background-image:url('https://www.iitg.ac.in/storage/gallery/1/853616027.jpg');
        height:590px;
        margin-top:-30px;
    }
    .main{
        text-align:center;
        font-size:50px;
    }
    .section2{
        background-color:white;
        text-align:center;
        width:60%;
        margin-left:20%;
    }
       </style>
    </head>
    <body>
        <h1 class="header"> Detail of Election</h1>
        <div class="section">
        <?php
        include("connect.php");
           $sql2="select * from votetime ";
           $stmt2=$conn->query($sql2);
           $time=$stmt2->fetch(PDO :: FETCH_ASSOC);
           $title=$time['title'];
           echo "<div class='section2'>";
           echo "<h1 class='main' > Election title is ". $title."</h1>";
           $t1=$time['stime'];
           $t2=$time['etime'];
           echo " <div class='main'>Election starting time -".$t1;
           echo "<br><br>Election ending time-".$t2;
           echo "</div></div>";
        ?>
        </div>
    </body>
</html>









