<?php
    session_start();
    session_destroy(); //Destroying all the session created.

    header('Location:./index.php');

?>