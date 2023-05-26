<?php
    session_start();
    
    //* Connect to Database "sniffy"
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "sniffy";
    $dbPort = 3306;

    $notfound = null;    
    $conn = new  PDO("mysql:host=$dbHost;dbname=$dbName;port=$dbPort",$dbUser,$dbPass);
    
    //* insert user in the table 'users'

    $query = ('DELETE FROM packets WHERE username = ?');
    $request = $conn->prepare($query);
    $request->execute(array($_SESSION['username']));        

    //* close the connection
    $conn = null;
    header('location:savedpackets.php');
?>