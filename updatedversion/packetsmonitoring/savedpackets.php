<?php
    session_start();
    
    //* Connect to Database "sniffy"
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "sniffy";
    $dbPort = 3306;

    $notfound = null;    
    $conn = new  PDO("mysql:host=$dbHost;dbname=$dbName;port=$dbPort",$dbUser,$dbPass);
    
    //* insert user in the table 'users'

    $query = ('SELECT * FROM packets WHERE username = ?');
    $request = $conn->prepare($query);
    $request->execute(array($_SESSION['username']));
    $rows = $request->fetch();
        

    //* close the connection
    $conn = null;
?>
<html>
    <head>
        <title>Result</title>
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
    </head>
    
    <body>
    <nav>
              <div class="navigation-wrap bg-light start-header start-style">  
                     <div class="container">  
                            <div class="row">  
                                   <div class="col-12">  
                                          <nav class="navbar navbar-expand-md navbar-light">  
                                                 <a class="navbar-brand" href="index.php" target="_self" >
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

            <div class = "status-bar">
                <p class = "status-bar-username">
                    <?php echo "Logged in as <u>".$_SESSION['username']."</u>"; ?>
                </p>
                <p><a href="../login/logout.php" role="button" class="btn btn-primary " style="background-color: #8167a9; border-color: #8167a9; ">Logout </a></p>
            </div>

            <div class = "content-box">
                <table  class='table-hover table-primary' style = 'width: 100%;'>
                    <tr>
                        <th>Protocol</th>
                        <th>Timestamp</th>
                        <th>Source IPv4</th>
                        <th>Source Port</th>
                        <th>Destination IPv4</th>
                        <th>Destination Port</th>
                        <th>Source MAC</th>
                        <th>Destination MAC</th>
                        <th>Packet length</th>
                    </tr>
                    <?php
                        // Loop through each row in the DataBase
                        do{
                            if($rows == false){
                                $notfound = "No data found for this user";
                                break;
                            }
                            else{
                    ?>
                        <tr>

                            <td><?php echo $rows[1] ; ?></td>
                            <td><?php echo $rows[2] ; ?></td>
                            <td><?php echo $rows[3] ; ?></td>
                            <td><?php echo $rows[4] ; ?></td>
                            <td><?php echo $rows[5] ; ?></td>
                            <td><?php echo $rows[6] ; ?></td>
                            <td><?php echo $rows[7] ; ?></td>
                            <td><?php echo $rows[8] ; ?></td>
                            <td><?php echo $rows[9] ; ?></td>

                        </tr> 
                    <?php }
                        }while ($rows = $request->fetch());
                        if($notfound != null)
                            echo '<div class="alert alert-warning" style="text-align:center;">' .$notfound . '</div>' ;                
                    ?>
            </table>
            </div>
                <div>
                    <p>
                        <a href="monitor.php" role="button" class="btn btn-primary " style="background-color: #8167a9; border-color: #8167a9; ">New capture</a>
                        <a href="dropdata.php" role="button" class="btn btn-primary " style="background-color: #8167a9; border-color: #8167a9; ">Drop Data</a>
                    </p>

                </div>
        </div>
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
                    <p class="h6"><?php echo date('Y'); ?> &copy;  Travail réalisé par : INDIA-Groupe-4 </p>  
                    </div>  
                <hr/>  
            </div>      
        </div>   
    </footer>
</body>
</html>