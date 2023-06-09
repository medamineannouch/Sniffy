<?php
       session_start();
       
       //* list of variables that must be set null to no have a value from the last connect time!
       $_SESSION['imported'] = null;

       //Check if session already exists i.e. if user is already logged in
       if(!empty($_SESSION['logged_in']) && $_SESSION['logged_in']){
              header('Location: ../main/landing.php');
              exit();//Stop executing rest script
       }
       //* initialize global variables
       $username = null;
       $password = null;
       //* show success msg when the user is redirected from register (successfully registred)
       $msg = null;
       if(!empty($_SESSION['registered'])){
              if($_SESSION['registered'] == true){
                     $msg =  "Successfylly Registred !";
                     $_SESSION['registered'] = false;
              }
       }

       //* authentification of the user after pressing "login"
       if($_SERVER['REQUEST_METHOD'] == 'POST'){
              $username = $_POST['username'];
              $password = $_POST['password'];
                                                       
              //* Connect to Database "sniffy"
              $dbHost = "localhost";
              $dbUser = "root";
              $dbPass = "";
              $dbName = "sniffy";
              $dbPort = 3306;
              
              $conn = new  PDO("mysql:host=$dbHost;dbname=$dbName;port=$dbPort",$dbUser,$dbPass);
              
              //* check user in the table 'users'
              $authError = null;
              $query = ('SELECT password FROM users WHERE username = ?');
              $request = $conn->prepare($query);
              $request->execute(array($username));
              $extractedPassword = $request->fetch();
              if($extractedPassword === false){ 
                     //! case if the user doesn't exist
                     $authError = "unfound user ! please register";
              }
              elseif($extractedPassword['password'] != $password){
                     //! case if user exists but enters wrong password
                     $authError = "Uncorrect password !";
              }
              else{//* valide authentification !
                     $_SESSION['username'] = $username;
            	       $_SESSION['password'] = $password;
                     $_SESSION['logged_in'] = true;
                     $_SESSION['login_failed'] = false;
                     header('location:../main/landing.php');
              }
              
              //* reairect to login.php (itself) with filled fields 
               
              // header('location:login.php');
       }
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
<title>HOME</title>
</head>
<body>
       <nav>
              <div class="navigation-wrap bg-light start-header start-style">  
                     <div class="container">  
                            <div class="row">  
                                   <div class="col-12">  
                                          <nav class="navbar navbar-expand-md navbar-light">  
                                                 <a class="navbar-brand" href="http://ensam.um5.ac.ma" target="_blank" >
                                                        <img src="../imgs/logo_ensamr.jpeg" alt="logo">
                                                 </a>    
                                                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">  
                                                 <span class="navbar-toggler-icon"> </span>  
                                                 </button>  
                                                 <div class="collapse navbar-collapse" id="navbarSupportedContent">  
                                                        <ul class="navbar-nav ml-auto py-4 py-md-0">  
                                                        <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">  
                                                               <a class="nav-link dropdown-toggle"  href="../main/index.php" role="button" aria-haspopup="true" aria-expanded="false"> Home </a>  
                                                        </li>  
                                                        <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">  
                                                               <a class="nav-link" href="#"> About-us</a>  
                                                        </li>  
                                                        <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">  
                                                               <a class="nav-link" href="#"> Contact-us </a>  
                                                        </li>  
                                                        </ul>  
                                                 </div>  
                                          </nav>  
                                   </div>  
                            </div>  
                     </div>  
              </div> 
              <br><br><br>
       </nav>
 <main>
       <?php
              // var_dump($extractedPassword['password']);
              if(!empty($msg)){
                     echo '<div class="alert alert-success" style="text-align:center;">' .$msg . '</div>' ;
              }
              elseif(!empty($authError))
                     echo '<div class="alert alert-danger" style="text-align:center;">' .$authError . '</div>' ;

                     
       ?>
    <form action="login.php" method="post">
       <h1>Login</h1>
       <div>
           <label for="username">Username :</label>
           <input type = "text" name = "username" placeholder = "Enter your username" value="<?php echo $username ;?>" required />
       </div>
       <div>
           <label for="password">Password:</label>
           <input type = "password" name = "password" placeholder="Enter password" required />
       </div>
       <section>
           <button type = "submit" name = "submit">Login</button>
           <a href="register.php">Register</a>
       </section>
    </form>
</main>
<footer>
<section id="footer">  
<div class="container">  
<div class="row text-center text-xs-center text-sm-left text-md-left">  
<div class="col-xs-12 col-sm-4 col-md-4">  
<h5> Liens rapides </h5>  
  <ul class="list-unstyled quick-links">  
    <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> Home </a> </li>   
    <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> FAQ </a> </li>  
</ul>  
</div>  
          <div class="col-xs-12 col-sm-4 col-md-4">  
    
    </div>  
    <div class="col-xs-12 col-sm-4 col-md-4">  
    <h5> à propos </h5>  
             <ul class="list-unstyled quick-links">  
     
    <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> About </a></li>  
    
    <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> Contact </a> </li>  
    </ul>  
    </div>  
    </div>  
          
    <div class="row">  
    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">  
    <p class="h6">2023 &copy;  Travail réalisé par : INDIA-Groupe-4 </p>  
    </div>  
    <hr>  
    </div>      
    </div>  
    </section>  
</footer>
</body>
</html>