<?php
    session_start();
    $id=$_POST['id'];

    $conn=mysqli_connect("localhost","root","","nikhil");
    if(!$conn){
        echo"Connection Error. Cannot connect to the server.";
    }
    else{
        $query="DELETE FROM emp_info WHERE loginId='$id'";
        $result=mysqli_query($conn,$query);
        if($result){
            echo "<div><center><h1>Employee ".$id." removed from system.</center></h1></div><br>";
        }
        else{
            echo "Invalid Employee I'D";
        }
    }
    mysqli_close($conn);

?>
<html>
    <head>
        <link rel="icon" href="images/download.jpg">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <style>
            body{
                background-image: url(images/d.jpg);
                color: antiquewhite;
            }
            a{
                color: antiquewhite;
            }
            div{
                margin-top: 100px;
            }
        </style>
    </head>
    <body>
        <center>
            <a href="./logout.php">Logout</a>
        </center>
        
    </body>
</html>

