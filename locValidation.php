<?php
    session_start();
    $var=$_GET['location'];     //Receiving location variable. 
    $loc_data=json_decode($var);        //Decoding JSON array(empLoc). 
    
    //Setting empLoc array value to variables.
    $hour=$loc_data->{'hour'};
    $minutes=$loc_data->{'min'};
    $user=$_SESSION['loginId'];
    $status=null;
   // $work_date='2020-4-6';
    $lat=$loc_data->{'latitude'};
    $longi=$loc_data->{'longitude'};
    $date=$loc_data->{'date'};  //Format YYYY:MM:DD
    $time=$loc_data->{'time'};  //Format HH:MM:SS
    $latitude=null;
    $longitude=null;

    if($hour >= '23' && $hour<='00')    //Checking time of attendance
    {
        if($lat>=17 && $lat<=20 && $longi>=72 && $longi<=74){       //Validating location.
            $status='Present';      //If employee is in time and in the campus mark status as present.
        }
         
    } 
    else
    { 
        $status='Absent';       //If employee is not in time or not in the campus mark status as absent.
    }

    echo "<center>"."<h1>"."Your Attendance have been marked sucessfully !"."</h1>";

    echo "Your Location is:"."<br>";
    echo "<br>"."Lat: ".$lat."<br>"."Long: ".$longi."<br>"."Date:".$date." "."Time:".$time."</center>" ;

    //Database connection
    $conn=mysqli_connect("localhost","root","","nikhil");
    
    if(!$conn){
        echo"Connection Error";
    }
        
    else{
        //Inserting attendance record in database.
        $query="insert into location values('$lat','$longi','$date','$time','$status','$user')";
        $res=mysqli_query($conn,$query);
    }

    mysqli_close($conn); //Closing database connection
?>
<html>
    <head>
        <link rel="icon" href="images/download.jpg">
        <title>Online Employee Attendance System</title>
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
        <nav>
            <a href="attendancePage.php">Home</a>
            <a href="./show.php">Click to see your attendance</a><br>
            <a href="./logout.php">Logout</a>
        </nav>
        
        
    </body>
</html>
