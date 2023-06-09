<?php 
    session_start();//Start a new session
    //Check if session already exists i.e. if user is already logged in
    if(!empty($_SESSION['logged_in']) && $_SESSION['logged_in']){
        header('Location: ../main/landing.php');
        exit();//Stop executing rest script
    }
	
    //Check if form has been submitted and $_POST has form data
    if(isset($_POST['submit'])){
	
	        // Connect to Database
	        $dbHost = "localhost";
	        $dbUser = "root";
	        $dbPass = "";
	        $dbName = "sniffy";
	        $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

	        // Test if connection occurred
	        if(mysqli_errno($conn)){
	            die("Database connection failed: " . 
	               mysqli_connect_error() . 
	               " (" . mysqli_connect_errno() . ")"
	               );
	        }

	        // Get username and password from form
	        $username = $_POST['username'];
	        $password = $_POST['password'];

	        // Query database
	        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
	        $result = mysqli_query($conn, $query) or die("Database query failed");

            

	        // Process the returned data
	        $row = mysqli_fetch_assoc($result);
	        if($username && $password && $row['username'] == $username && $row['password'] == $password){
                $_SESSION['username'] = $row['username'];
            	$_SESSION['password'] = $row['password'];
            	$_SESSION['id'] = $row['id'];
	            $_SESSION['logged_in'] = true;
	            $_SESSION['login_failed'] = false;
	            header("Location: ../main/landing.php");
	            exit();
	        }
	        else{
	            $_SESSION['login_failed'] = true;
	            $_SESSION['logged_in'] = false;
		    echo "<script> window.onload = function () { document.getElementById('error').innerHTML = 'Incorrect username or password';} </script>";
        	}

	        // Free up memory
        	mysqli_free_result($result);

	        // Close database connection, if set
        	if(isset($conn)){
	            mysqli_close($conn);    
        	}
	
    }
?>