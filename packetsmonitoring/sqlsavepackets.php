<?php
    session_start();
    
    //* Connect to Database "sniffy"
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "sniffy";
    $dbPort = 3306;

    $conn = new  PDO("mysql:host=$dbHost;dbname=$dbName;port=$dbPort",$dbUser,$dbPass);
    
    //* insert packet in the table 'packets'
    $i=0;
    while($i<count($_SESSION['$CSVRAW'])/10){
        $query = ('INSERT INTO packets VALUES(?,?,?,?,?,?,?,?,?,?)');
        $request = $conn->prepare($query);
        $request->execute(array($_SESSION['$CSVRAW'][$i*10],$_SESSION['$CSVRAW'][$i*10+1],$_SESSION['$CSVRAW'][$i*10+2],$_SESSION['$CSVRAW'][$i*10+3],$_SESSION['$CSVRAW'][$i*10+4],$_SESSION['$CSVRAW'][$i*10+5],$_SESSION['$CSVRAW'][$i*10+6],$_SESSION['$CSVRAW'][$i*10+7],$_SESSION['$CSVRAW'][$i*10+8],$_SESSION['$CSVRAW'][$i*10+9]));
        $i++;
    }
    //* close the connection
    $conn = null;
    $_SESSION['imported'] = "sql";
    header('location:importmode.php');
?>
