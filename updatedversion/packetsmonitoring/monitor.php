<?php

       session_start();
       //Check if session already exists i.e. if user is already logged in
       if(empty($_SESSION['logged_in']) || (!empty($_SESSION['logged_in']) && !$_SESSION['logged_in'])){
       $_SESSION['login_failed'] = true;
       header('Location: ../login/login.php');
       exit();//Stop executing rest script
       }

    ?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
   <link rel = "stylesheet"   
         href = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"  
         integrity = "sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"  crossorigin = "anonymous">
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">    
   <link rel="stylesheet" href="../style/header.css">
   <link rel="stylesheet" href="../style/footer.css">
    <link rel="stylesheet" href="../style/register.css">
        
    <title><?= $title ?? 'Packets Tracking' ?></title>
</head>

<body>

<nav>
              <div class="navigation-wrap bg-light start-header start-style">  
                     <div class="container">  
                            <div class="row">  
                                   <div class="col-12">  
                                          <nav class="navbar navbar-expand-md navbar-light">  
                                                 <a class="navbar-brand" href="../main/index.php" target="_self" ><img src="../imgs/logo.jfif" alt="logo"></a>    
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
       </nav>    <main>
        <div class = "status-bar">
            <p class = "status-bar-username">
                <?php echo "Logged in as <u>".$_SESSION['username']."</u>"; ?>
            </p>
            <p><a href="../login/logout.php" role="button" class="btn btn-primary " style="background-color: #8167a9; border-color: #8167a9; ">Logout </a></p>
        </div>
        
        <form action = "captureresults.php" method = "POST" style=" border: 5px solid #8167a9; border-radius: 10px; box-shadow: 4px 4px 4px #8167a9; ">
            <h1>Packets Tracking</h1>
           
            
                    <div>
                    <p style="font-size: larger; /* Increase the font size */
                            text-decoration: underline; ">Protocols</p><br><br>

                        <div style="display: flex;justify-content: center; align-items: center;">
                            <div >
                            <input type = "radio" name = "protocol" value = "tcp" checked>TCP<br><br>
                            <input type = "radio" name = "protocol" value = "udp">UDP<br><br>
                            <input type = "radio" name = "protocol" value = "icmp">ICMP<br><br>
                            </div>
                        
                    </div>
                    </div>
                    <div>
                        <label>Filter</label>
                        <select name = "filter">
                            <option value = "all">All</option>
                            <option value = "timestamp">Timestamp</option>
                            <option value = "sourceIP">Source IP</option>
                            <option value = "sourcePort">Source port</option>
                            <option value = "destinationIP">Destination IP</option>
                            <option value = "destinationPort">Destination port</option>
                            <option value = "sourceMAC">Source MAC</option>
                            <option value = "destinationMAC">Destination MAC</option>
                            <option value = "packetLength">Packet length</option>
                        </select>
                        <label>Packet count</label>
                        <input type="number" name = "packetCount" value = "10">
                    </div>
                
                <section>
                <input type = "submit" name = "" value = "Submit" style="background: #8167a9; color:white">
                </section>
            </form>
     </main>
            <br><br>
     
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
    <p class="h6"><?php echo date('Y'); ?> &copy;  Travail réalisé par : INDIA-Groupe-4 </p>  
    </div>  
    <hr>  
    </div>      
    </div>  
    </section>  
</footer>
</body>
</html>    
        
 