
<?php
    session_start();

// Establish database connection
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "sniffy";
$dbPort = 3306;
$username=$_SESSION['username'];

$conn = new  PDO("mysql:host=$dbHost;dbname=$dbName;port=$dbPort",$dbUser,$dbPass);

// Retrieve the table data from the POST request
$tableData = $_POST['data'];

// Convert the JSON string to an array of objects
$tableData = json_decode($tableData);

// Prepare and execute insert query for each row of data
$stmt = $conn->prepare("INSERT INTO paquets  VALUES (:username,:proto, :localAddr, :sourceport, :foreignAddr, :destport, :state)");

foreach ($tableData as $row) {
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':proto', $row->proto);
    $stmt->bindParam(':localAddr', $row->localAddr);
    $stmt->bindParam(':sourceport', $row->sourceport);
    $stmt->bindParam(':foreignAddr', $row->foreignAddr);
    $stmt->bindParam(':destport', $row->destport);
    $stmt->bindParam(':state', $row->state);
    $stmt->execute();
}

    //* close the connection
    $conn = null;
    $_SESSION['imported'] = "sql";
    header('location:importmode.php');
?>
