<?php
    session_start();
    if(!isset($_SESSION['loginId']))        //Checking session I'd
    {
        header('Location:./index.php');
    }
    echo "<h4>Welcome ".$_SESSION['fname']." ".$_SESSION['lname']."</h4>";
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
            h2{
                margin-top: 80px;
            }
            h3{
                font-family: sans-serif;
                font-size: 25px;
            }
        </style>
        <title>Administrator</title>
    </head>
    
    <body>
        <center>
            <h2> You have sucessfully loggedin as <u>Administrator</u>.</h2>
            <nav>
                <a href="attendancePage.php">Mark Attendance</a><br>
                <a href="register.html">Add new Employee</a><br>
                <a href="remove.html">Remove existing Employee</a><br>
                <a href="show.php">View attendance</a><br>
                <a href="selectId.html">Create Monthly Report of Employee</a><br>
            </nav> 
        </center>
        <footer>
            <nav>
                <a href="./logout.php">Logout</a>
            </nav>
        </footer>
    </body>
</html>
    