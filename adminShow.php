<?php
    session_start();

    if(!isset($_SESSION['loginId']))
    {
        header('Location:./index.php');
    }
    $id=$_POST['id'];
    
    $conn=mysqli_connect("localhost","root","","nikhil");
    if(!$conn){
    echo "Connection Error";
    }

    else{
    $query="SELECT * FROM emp_info WHERE loginId='$id'";
    
    $result=mysqli_query($conn,$query);
    
        if($tupple=mysqli_fetch_assoc($result)){
            $name=$tupple['fname'];
            $lname=$tupple['lname'];     
        }
        
        echo "<center>Login Id:".$id."<br>Name:".$name."<br>Last Name:".$lname."<br></center>";
        
        $query="SELECT * FROM Location WHERE loginId='$id'";
        
        $result=mysqli_query($conn,$query);
        
        echo "<center><table border=2px><tr><td>Date</td><td>Time</td><td>Attendance</td><tr>";
        while($tupple=mysqli_fetch_assoc($result)){
            echo "<tr><td>".$tupple['date']."</td><td>".$tupple['time']."</td><td>".$tupple['status']."</td></tr>";
        }
        echo "</table><center>";
    
    }

?>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <style>
            body{
                background-image: url(images/d.jpg);
                color: antiquewhite;
            }
            a{
                color: antiquewhite;
            }
        </style>
    </head>
    <body>
        <a href="./logout.php">Logout</a>
    </body>
</html>