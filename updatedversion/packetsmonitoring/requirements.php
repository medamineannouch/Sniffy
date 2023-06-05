<?php
    session_start();
    //TODO fix this page : always redirects tp monitor.php
    if(isset($_SESSION['again'])){
        if(!$_SESSION['again']){
            header("location:monitor.php");
            exit();
        }
    }

    if($_SERVER['REQUEST_METHOD']== 'POST'){
        if(empty($_POST['again'])){
            $_SESSION['again'] = true ;                   
        }//* if the check box is checked the page won't show again 
        else{
            $_SESSION['again'] = false ; 
        }
        header("location:monitor.php");
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Warning</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="../style/requirements.css" rel="stylesheet">
  </head>
  <body>
    <div class="container container-box">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
            <h1 class="text text-warning">Requirements</h1>
            <div class="formcontainer">
            <hr/>
            <div class="container">
            <p class="text text-danger"><b>- In order to track packets please ensure that you have the <u>following requirements</u>:</b> </p>
                <ul>
                    <li> <a href="https://www.winpcap.org/install/default.htm" target="_blank"> winpecap.exe </a> </li>
                    <li> <a href="https://www.winpcap.org/windump/install/" target="_blank"> windump.exe </a> </li>
                </ul>
            </div>
            <button type="submit">OK</button>
            <div class="container" style="background-color: #eee">
                <label style="padding-left: 15px">
                <input type="checkbox"  name="again"> Don't show again
                </label>
                <span class="psw">
                    <a href="https://tinyurl.com/mdm7cp2p" target="_blank">how to use them ?</a>
                </span>
            </div>
        </form>
    <div>
  </body>
</html>