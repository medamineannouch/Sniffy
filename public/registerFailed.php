<?php

    // require_once __DIR__ . '/../src/boostrap.php';
    // require_once __DIR__ . '/../src/register.php';

    // view('header', ['title' => 'Register']);
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
        <link rel="stylesheet" href="header.css">
        <link rel="stylesheet" href="footer.css">
        <link rel="stylesheet" href="register.css">
        <title><?= $title ?? 'Home' ?></title>
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&subset=devanagari,latin-ext">
    </head>
<body>
    <?php 
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            echo '<h5 class="alert alert-danger" style="text-align:center;"> email wrong format</h5>';
        }
    ?>
    <main>
    <form action="connectionDB.php" method="post">
        <h1>Sign Up</h1>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?= $inputs['username'] ?? '' ?>"
                   class="<?php // error_class($errors, 'username') ?>">
            <small><?= $errors['username'] ?? '' ?></small>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?= $inputs['email'] ?? '' ?>"
                   class="<?php // error_class($errors, 'email') ?>" >
            <small><?= $errors['email'] ?? '' ?></small>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password"  value="<?= $inputs['password'] ?? '' ?>"
                   class="<?php //error_class($errors, 'password') ?>">
            <small><?= $errors['password'] ?? '' ?></small>
        </div>
        <div>
            <label for="password2">Password Again:</label>
            <input type="password" name="password2" id="password2"  value="<?= $inputs['password2'] ?? '' ?>"
                   class="<?php //error_class($errors, 'password2') ?>">
            <small><?= $errors['password2'] ?? '' ?></small>
        </div>
        <div>
            <label for="agree">
                <input type="checkbox" name="agree" id="agree" value="checked" <?= $inputs['agree'] ?? '' ?>/> I agree
                with the
                <a href="#" title="term of services">term of services</a>
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
<div class="col-xs-12 col-sm-4 col-md-4">  
<h5> Liens rapides </h5>  
  <ul class="list-unstyled quick-links">  
    <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> Home </a> </li>   
    <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> FAQ </a> </li>  
    <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> Get Started </a> </li>  
              <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> Videos </a> </li>  
</ul>  
</div>  
          <div class="col-xs-12 col-sm-4 col-md-4">  
    <h5> notre compagnie </h5>  
    <ul class="list-unstyled quick-links">  
      
    <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> Our Services </a> </li>  
    <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> Expert Team </a> </li>  
    </ul>  
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
    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">  
    <ul class="list-unstyled list-inline social text-center">  
    <li class="list-inline-item"> <a href="#"> <i class="fa fa-facebook"> </i> </a> </li>  
             <li class="list-inline-item"> <a href="#"> <i class="fa fa-twitter"> </i> </a> </li>  
    <li class="list-inline-item"> <a href="#"> <i class="fa fa-instagram"> </i> </a> </li>  
    <li class="list-inline-item"> <a href="#"> <i class="fa fa-google-plus"> </i > </a> </li>  
    <li class="list-inline-item"> <a href="#"> <i class="fa fa-envelope"> </i> </a> </li>  
    </ul>  
    </div>  
    <hr>  
    </div>      
    <div class="row">  
    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">  
   <p class="h6"> 2024 Tous les droits sont réservés. <a class="text-green ml-2" href="#" target="_blank">              INDIA-G4 </a> </p>  
    </div>  
    <hr>  
    </div>      
    </div>  
    </section>  
</footer>
</body>
</html>