<?php
    session_start();

    if(!isset($_SESSION['username']))       //Checking sesion Id.
    {
	   header('Location:./index.php');
    }
?>