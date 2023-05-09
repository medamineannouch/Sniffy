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
</head>
@import url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&subset=devanagari,latin-ext');
<body>
       <nav>
              <div class="navigation-wrap bg-light start-header start-style">  
                     <div class="container">  
                     <div class="row">  
                            <div class="col-12">  
                            <nav class="navbar navbar-expand-md navbar-light">  
                            <a class="navbar-brand" href="index.php" target="_blank"><img src="logo.jfif" alt="logo"></a>    
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">  
                            <span class="navbar-toggler-icon"> </span>  
                            </button>  
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">  
                                   <ul class="navbar-nav ml-auto py-4 py-md-0">  
                                   <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">  
                                          <a class="nav-link dropdown-toggle"  href="index.php" role="button" aria-haspopup="true" aria-expanded="false"> Accueil </a>  
                                   </li>  
                                   
                                   <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">  
                                          <a class="nav-link dropdown-toggle"  href="index.php" role="button" aria-haspopup="true" aria-expanded="false"> Services </a>  
                                   </li>  
                                   <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">  
                                          <a class="nav-link" href="#"> A-propos </a>  
                                   </li>  
                                   <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">  
                                          <a class="nav-link" href="#"> Contacter-nous </a>  
                                   </li>  
                                   </ul>  
                            </div>  
                            </nav>  
                            </div>  
                     </div>  
                     </div>  
              </div> <br><br><br>
       </nav>
<p><a href="logout.php" role="button" class="btn btn-primary " style="background-color: #8167a9; border-color: #8167a9; ">Logout </a></p>


<?php
/*
session_start();
if(!isset($_SESSION['user'])){
        header('Location : index.php');
    }*/
    $_SESSION['donnees']=[
        'titre' => [],
        'emis' => [],
        'recu' => [],
    ];

?>

        <div class="container">
            
            <div class="row style ">
                <div class="row">
                    <p class="text-center fs-2 text-secondary  mt-3 mb-3  w-100">
                        Bienvenue Gays
                    </p>
                </div>


                <div class=" row">

                    <div class="card w-50" >
                        <img src="t11.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Effectuer un suivi Statistique</h5>
                            <p class="card-text">Afficher les statistiques des paquets en entree et sortie dans votre ordinateur sur un période donnée</p>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalSuivi">
                                Suivi
                            </button>
                        </div>
                    </div>
                    <div class="card w-50" >
                        <img src="t22.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Voir les paquets enregistrés</h5>
                            <p class="card-text">Retouvez les dernieres statistiques effectuées via notre application</p>
                            <a href="paquetsEnregistres.php" role="button" class="btn btn-primary " style="background-color: #8167a9; border-color: #8167a9; ">Voir </a>
                        </div>
                    </div>
                    

                </div>

                   
                    <!-- Modal -->
                    <div class="modal fade" id="ModalSuivi" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">Entrez la durée</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action ="suiviPaquet.php" method="get">
                            <select class="form-select" aria-label="Default select example" name ="duree">
                                <option selected value="1">1 min</option>
                                <option value="3">3 min</option>
                                <option value="5">5 min</option>
                                <option value="10">10min</option>
                            </select>
                                      
                            <button type="submit" class="btn btn-primary" style="background-color: #8167a9; border-color: #8167a9;">Envoyer</button>
                        </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                        </div>
                    </div>
                    </div>         
            </div>
           
        </div>
        </script>  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">

        </script>  

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
   <p class="h6"> 2023 ? Tous les droits réservés. <a class="text-green ml-2" href="#" target="_blank">              INDIA-G4 </a> </p>  
    </div>  
    <hr>  
    </div>      
    </div>  
    </section>  
</footer>
</body>
</html>
          
