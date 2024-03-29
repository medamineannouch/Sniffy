<?php
    session_start();
    //* triggered when import process is done
    $importmsg = null;
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(!empty($_SESSION['imported']) && $_SESSION['imported']==="csv"){
            $importmsg = "CSV file successfuly imported !";
        }elseif(!empty($_SESSION['imported']) && $_SESSION['imported']==="sql"){
            $importmsg = "Data successfully imported to DataBase";
        }
    }
    $_SESSION['imported'] = null;
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
<title><?= $title ?? 'Home' ?></title>
</head>
<body>
       <nav>
              <div class="navigation-wrap bg-light start-header start-style">  
                     <div class="container">  
                     <div class="row">  
                            <div class="col-12">  
                            <nav class="navbar navbar-expand-md navbar-light">  
                            <a class="navbar-brand" href="http://ensam.um5.ac.ma" target="_blank">
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
                                                               <a class="nav-link" href="#"> About-us  </a>  
                                                        </li> 
                                   <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">  
                                          <a class="nav-link" href="#"> Contact-us </a>  
                                   </li>  
                                   </li>  
                                   <li style="margin-left:30px;">
                                    <a href="../login/logout.php" role="button" class="btn btn-primary " style="background-color: #8167a9; border-color: #8167a9; ">Logout </a>
                                   </li>
                                   </ul>  
                            </div>  
                            </nav>  
                            </div>  
                     </div>  
                     </div>  
              </div> <br><br><br>
       </nav>
       <br>
       <br>
       <?php
              // var_dump($extractedPassword['password']);
              if(!empty($importmsg)){
                     echo '<div class="alert alert-success" style="text-align:center;">' .$importmsg . '</div>' ;
              }      
        ?>    
        <div class="container">
            <div class="row style ">
                <div class="row">
                    <p class="text-center fs-2 text-secondary  mt-3 mb-3  w-100">
                        Save Mode
                    </p>
                </div>

                <div class=" row">

                    <div class="card w-50" >
                        <br>
                        <div style=" display: flex; justify-content: center;">
                        <img src="../imgs/file.png" style="width: 500px; height: 150px;" class="card-img-top" alt="...">

                        </div>
                        <div class="card-body">
                            <h5 class="card-title">CSV file</h5>
                            <p class="card-text">Export Data in CSV file format</p>
                            <a href="csvsavepackets.php" role="button" class="btn btn-primary btn-block" style="background-color: #8167a9; border-color: #8167a9;">
                            <!-- <button>Export</button> --> Download
                            </a> 
                         </div>
                    </div>
                    <div class="card w-50" >
                    <br>
                    <div style=" display: flex; justify-content: center;">
                        <img src="../imgs/sql.png" style="width: 500px; height: 150px;" class="card-img-top" alt="...">
                    </div>
                        <div class="card-body">
                            <h5 class="card-title">Database</h5>
                            <p class="card-text">Export Data to the Database</p>
                            <a href="sqlsavepackets.php" role="button" class="btn btn-primary btn-block" style="background-color: #8167a9; border-color: #8167a9;">
                            <!-- <button>Export</button> --> Export
                            </a>
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
<h5> Links </h5>  
  <ul class="list-unstyled quick-links">  
    <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> Home </a> </li>   
    <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> FAQ </a> </li>
</ul>  
</div>  
          <div class="col-xs-12 col-sm-4 col-md-4">  
    
    </div>  
    <div class="col-xs-12 col-sm-4 col-md-4">  
    <h5>About </h5>  
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