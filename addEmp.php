<?php
    session_start();
    $fName=$_POST['Fname'];
    $lName=$_POST['Lname'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $contactNo=$_POST['mobile'];
    $loginId=$_POST['Login'];
    $password=$_POST['Passwd'];
    $ConfirmPassword=$_POST['Cpasswd'];

if($password != $ConfirmPassword){ //Entered password mismatched in the form.
    echo "Your confirmed password is different than new password";
    header("Location:.\register.html");
}
else{
    $conn=mysqli_connect("localhost","root","","nikhil");
    if(!$conn){
        echo"Connection Error";
    }
    else{       //Inserting new employee details to database
        $query="insert into emp_info (`fName`, `lName`, `gender`, `loginId`, `passwd`, `emailId`, `contactNo`, `address`)  values('$fName','$lName','$gender','$loginId','$password','$email','$contactNo','$address')";
        $result=mysqli_query($conn,$query);
        if($result){        //Displaying details of new employee.
            echo "<div><center><h1>New Employee added to the system sucessfully.</h1></div><br>New Employee Details:<br>First Name: ".$fName."<br>"."Last Name: ".$lName."<br>"."Gender: ".$gender."<br>"."Login I'D: ".$loginId."<br>"."Password: ".$password."<br>"."Email I'D: ".$email."<br>"."Contact Number: ".$contactNo."<br>"."Address: ".$address."<br></center>";
        }
        else{
            echo "Problem in insertion";
        }
    }
    mysqli_close($conn);
}
?>
<html>
    <head>
        <!--Online CSS-->
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
        <br><a href="admin.php">Go to Home</a><br>
        <a href="./logout.php">Logout</a>
    </body>
</html>