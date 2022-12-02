<?php
    if(isset($_POST['time'])){
        echo "<script>
              window.location='./time.php';
             </script>
            ";
    }
    if(isset($_POST['nomini'])){
        echo "<script>
            window.location='./verify_nomini.php';
        </script>
        ";
    }
?>
<!DOCTYPE html>
<head>
    <style>
.main{
        background-image:url('https://www.iitg.ac.in/storage/gallery/1/853616027.jpg');
        height:690px;
        margin:0px;
        background-attachment: fixed;
    }
    .btn{
         text-align:center; 
         margin:auto;
        font-size:50px;
        
        background-color:white; 
        color:red;
        width:400px;
        height:250px;
    }
    .inpu{
        font-size:30px;
        background-color:blue;
        color:white;
    }
    </style>
</head>
<body>
    <div class="main">
        <div class="btn">
            <form action="" method='POST'>
         <input class="inpu" type="submit" value="set timing for election" name="time">
         <br><br>
         <input class="inpu" type="submit" value="Verify Nomini" name="nomini">
        </form>
       </div>
    </div>
</body>