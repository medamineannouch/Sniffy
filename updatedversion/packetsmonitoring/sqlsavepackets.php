<?php
    session_start();
    
    //* Connect to Database "sniffy"
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "sniffy";
    $dbPort = 3306;

    $conn = new  PDO("mysql:host=$dbHost;dbname=$dbName;port=$dbPort",$dbUser,$dbPass);
    
    //* insert user in the table 'users'
    for($i=0;$i<count($_SESSION['$CSVRAW'])/9;$i++){
        $query = ('INSERT INTO packets VALUES(?,?,?,?,?,?,?,?,?)');
        $request = $conn->prepare($query);
        $request->execute(array($_SESSION['$CSVRAW'][$i*9],$_SESSION['$CSVRAW'][$i*9+1],$_SESSION['$CSVRAW'][$i*9+2],$_SESSION['$CSVRAW'][$i*9+3],$_SESSION['$CSVRAW'][$i*9+4],$_SESSION['$CSVRAW'][$i*9+5],$_SESSION['$CSVRAW'][$i*9+6],$_SESSION['$CSVRAW'][$i*9+7],$_SESSION['$CSVRAW'][$i*9+8]));
    }
    //* close the connection
    $conn = null;
    $_SESSION['imported'] = "sql";
    header('location:importmode.php');
?>
