<?php
    session_start();
    //*delete all SESSION Variables
    session_unset();
    //*just read its name xD
    session_destroy();
    header('location:login.php');

?>