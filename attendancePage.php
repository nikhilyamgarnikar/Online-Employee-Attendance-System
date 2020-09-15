<?php
    session_start();

    if(!isset($_SESSION['loginId']))    //Checking session I'd
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
        </style>
    </head>
    
    <body>
        <div>
            <center>
            <h3> You have sucessfully logedIn as <u><?php echo $_SESSION['loginId']?>.</u></h3>
            <p>Click the button to mark your attendance.</p>
            <button type="submit" class="btn btn-primary" name="btnLogin" onclick="getLocation()">Mark Attendance</button>
            <p id="demo"></p>
            </center>
        </div>
        <script>
            function getLocation(){
                
                var x = document.getElementById("demo");    
                var empLoc={};      //Empty array
                
                function getCoordinates(position) {
                    //Function to get coordinates and current date and time.
                    const lat  = position.coords.latitude; 
                    const long = position.coords.longitude;
                    
                    var today = new Date();     //Creating object of date
                    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();    //Getting current date
                    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();      //Getting current time
                    var hour=today.getHours();      //Getting current time(hour)
                    var min=today.getMinutes();     //Getting current time(minute)
                    
                    //setting array variables of empLoc
                    empLoc.latitude=lat;
                    empLoc.longitude=long;
                    empLoc.date=date;
                    empLoc.time=time;
                    empLoc.hour=hour;
                    empLoc.min=min;
                    
                    //Using stringfy function in JSON to transfer empLoc array
                    var locObj=JSON.stringify(empLoc);
                    
                    //using window.location method to send the array
                    window.location="locValidation.php?location="+locObj;
        }
           
                //error is the parameter in a geolocation object that we pass to function.
        function showError(error) {
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    alert("User denied the request for Geolocation.");
                break;
                case error.POSITION_UNAVAILABLE:
                    alert("Location information is unavailable.");
                break;
                case error.TIMEOUT:
                    alert("The request to get user location timed out.");
                break;
                case error.UNKNOWN_ERROR:
                    alert("An unknown error occurred.");
                break;
      }
    }
                //this 'if' checks if geolocation is avialabe or not.
        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(getCoordinates,showError);
        }
        else{
            alert("Geolocation not available. Conatct your admin.");
        }
}
        </script>
        <center>
            <nav>
                <a href="./show.php">Click to see your attendance.</a><br>
                <a href="./logout.php">Logout</a>
                </nav>
        </center>
        
            
            
        
       
        
    </body>
</html>