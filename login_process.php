<?php
    session_start();
    $loginId=$_POST['loginId'];
    $passwd=$_POST['passwd'];
    $count=0;
    
    //Database connection
    $conn=mysqli_connect("localhost","root","","nikhil");
    if(!$conn){
        echo "Connection Error";
    }    
    else{
        //select query to validate login I'd and password.
        $query="SELECT * FROM emp_info WHERE loginId='$loginId' AND passwd='$passwd'";
    
        $result=mysqli_query($conn,$query);
        
        if($tupple=mysqli_fetch_assoc($result)){
            $count=1;
            //setting session variables so that we can acess them throught the project.
            $_SESSION['loginId']=$tupple['loginId'];
            $_SESSION['fname']=$tupple['fName'];
            $_SESSION['lname']=$tupple['lName'];
            
            //Checking for admin
            if($loginId=='admin' && $passwd=='Dkte123'){
                header('Location:.\admin.php');
            }
            
            else{
                    //Logging in as employee
                    header('Location:.\attendancePage.php');
                }
        }
        if($count==0){
            echo "Invalid LoginId Password !";
            header('Location:.\index.php');
        }
    }
        mysqli_close($conn);//Closing database connection.
    
?>