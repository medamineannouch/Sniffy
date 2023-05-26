<?php
       session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>   
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"> </script>    
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"> </script>    
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jqPlot/1.0.9/jquery.jqplot.min.js" integrity="sha512-FQKKXM+/7s6LVHU07eH2zShZHunHqkBCIcDqodXfdV/NNXW165npscG8qOHdxVsOM4mJx38Ep1oMBcNXGB3BCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       <script type='text/javascript' src="https://cdn.rawgit.com/abdmob/x2js/master/xml2json.js"></script>
       <script type="text/javascript" src="jqplot/jquery.jqplot.js"></script>
       <script type="text/javascript" src="jqplot/plugins/jqplot.barRenderer.js"></script>
       <script type="text/javascript" src="jqplot/plugins/jqplot.pieRenderer.js"></script>
       <script type="text/javascript" src="jqplot/plugins/jqplot.categoryAxisRenderer.js"></script>
       <script type="text/javascript" src="jqplot/plugins/jqplot.pointLabels.js"></script>
       <link rel="stylesheet" type="text/css" href="jqplot/jquery.jqplot.css" /> 
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
       <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
       <link rel = "stylesheet"href = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"  
              integrity = "sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"  crossorigin = "anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">    
        <link rel="stylesheet" href="../style/header.css">
        <link rel="stylesheet" href="../style/footer.css">
        <link rel="stylesheet" href="../style/register.css">
        <title>Register</title>
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&subset=devanagari,latin-ext">
    </head>
<body>
    <main>
              <!--
              charaf !!!!
              -->
              <!-- //*Sure bro I got yout back ;) -->
              <?php 
                     $checkval = null;
                     $checkError = null;
                     $pswdError = null;
                     $mailError = null;
                     $username = null;
                     $email = null;
                     $password = null;
                     //* processing the data posted by the form
                     if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            $username = $_POST['username'];
                            $email = $_POST['mail'];
                            $password = $_POST['password'];
                            if(empty($_POST['agree'])){
                                   $checkError = "* This option is required !" ;          
                            } 
                            //* check email format (Regular Expression)
                            elseif(!preg_match("/^([a-zA-Z0-9]{1,})@(gmail|email|hotmail|outlook|um5)\.[a-zA-z]{2,}/",$email)){
                                   $mailError = "Invalid mail format !";
                                   //* after posting the check input will be checked if the page is not redirected to login.php    
                                   $checkval = "checked"; 
                            }
                            
                            //* check the second password
                            elseif($password !== $_POST['password2']){
                                   $pswdError = "The password doesn't match the first one!";
                                   //* after posting the check input will be checked if the page is not redirected to login.php    
                                   $checkval = "checked"; 
                            }
                            else{ 
                                                                       
                                   
                                   //* Connect to Database "sniffy"
                                   $dbHost = "localhost";
                                   $dbUser = "root";
                                   $dbPass = "";
                                   $dbName = "sniffy";
                                   $dbPort = 3306;
                                   
                                   $conn = new  PDO("mysql:host=$dbHost;dbname=$dbName;port=$dbPort",$dbUser,$dbPass);
                                   
                                   //* insert user in the table 'users'
                                   $query = ('INSERT INTO users(username,password,email) VALUES(?,?,?)');
                                   $request = $conn->prepare($query);
                                   $request->execute(array($username,$password,$email));
                                   
                                   //* reairect to login.php with filled fields 
                                   $_SESSION['registered'] = true;
                                   header('location:login.php');
                            }
                     }
                     
              ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post"> <!--   //* "htmlspecialchars($_SERVER['PHP_SELF'])":eviter les attacks XSS (cross site scripting)-->
        <h1>Sign Up</h1>
        <div>
            <label for="username">Username:</label>
            <input type = "username" name = "username" placeholder="Enter username" value="<?php echo $username; ?>" required />
        </div>
        <div>
            <label for="email">Email:</label>
            <input type = "mail" name = "mail" placeholder="Enter your mail" value="<?php echo $email; ?>" required />
            <span class="text-danger"> <?php echo $mailError ;?> </span>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type = "password" name = "password" placeholder="Enter a password" value="<?php echo $password; ?>" required />
        </div>
        <div>
            <label for="password2">Password Again:</label>
            <input type = "password" name = "password2" placeholder="Enter again the password" " required />
            <span class="text-danger"> <?php echo $pswdError ;?> </span>
        </div>
        <div>
            <label for="agree">
                <input type="checkbox" name="agree" id="agree" value="agree" <?php echo $checkval; ?> /> I agree
                with the
                <a href="#" title="term of services">term of services</a>
                <!-- //! show the Error if it is triggered  -->
                <span class="text-danger"> <?php echo $checkError ;?> </span>
            </label>
            <small><?= $errors['agree'] ?? '' ?></small>
        </div>
        <button type="submit">Register</button>
        <footer>Already a member? <a href="login.php">Login here</a></footer>
    </form>
</main>
<footer>
       <section id="footer">  
              <div class="container">  
                     <div class="row text-center text-xs-center text-sm-left text-md-left">  
                            
                            <div class="col-xs-12 col-sm-6 col-md-4">  
                                   <h5> Links </h5>  
                                   <ul class="list-unstyled quick-links">  
                                          <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> Home </a> </li>   
                                          <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> FAQ </a> </li> 
                                   </ul>  
                            </div> 
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                    
                            </div>   
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                   <h5> About</h5>  
                                   <ul class="list-unstyled quick-links">                              
                                          <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> About </a></li>                             
                                          <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> Contact </a> </li>  
                                   </ul>  
                            </div>                     
                            
                     </div>  
              </div>  
    
              <div class="row">  
                     <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">  
                            <p class="h6"><?php echo date('Y')?> &copy;  Travail réalisé par : INDIA-Groupe-4 </p>  
                     </div>  
              </div>   
       </section>  
</footer>
</body>
</html>