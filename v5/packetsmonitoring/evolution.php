<?php
    session_start(); //Started at login/login/login.php
    if(empty($_SESSION['logged_in']) || !$_SESSION['logged_in']){
        $_SESSION['login_failed'] = false;
        header('Location: ../login/login.php');
        exit();
    }
    //* this array contains the data to save it when pressing in 'save' button
    $CSVRAW = array();
?>

<html>
    <head>
        <title>Result</title>
        <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>   
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"> </script>    
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"> </script>    
       <script type='text/javascript' src="https://cdn.rawgit.com/abdmob/x2js/master/xml2json.js"></script>
       <link rel="stylesheet" type="text/css" href="jqplot/jquery.jqplot.css" /> 
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
       <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
       <link rel = "stylesheet"href = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"  
              integrity = "sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"  crossorigin = "anonymous">
              <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">    
        <link rel="stylesheet" href="../style/header.css">
       <link rel="stylesheet" href="../style/footer.css">
       <link rel="stylesheet" href="../style/register.css">
       <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
       <script type='text/javascript' src="helpers.js"></script>


    </head>
    
    <body>
    <nav>
              <div class="navigation-wrap bg-light start-header start-style">  
                     <div class="container">  
                            <div class="row">  
                                   <div class="col-12">  
                                          <nav class="navbar navbar-expand-md navbar-light">  
                                                 <a class="navbar-brand" href="http://ensam.um5.ac.ma" target="_target" >
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
              </div> 
              <br><br><br>
       </nav>
       <main>
        
        <div class = "status-bar">
            <p class = "status-bar-username text-center fs-2 text-secondary  mt-3 mb-3  w-100">
                <?php echo "Logged In as <u>".$_SESSION['username']."</u>"; ?>
            </p>
        </div>
        <div class = "content-box">
        <div class="chart-container" style="display: inline-block;
    width: 80%; 
    margin: 50px;">
        <canvas id="chartReceived"></canvas>
        </div>


        <div class="chart-container" style="display: inline-block;
    width: 80%; 
    margin: 50px;">
        <canvas id="chartSent"></canvas>
        </div>
        </div>
        
        
       

</main>  
<script> 

function fetchData() {
            // Effectue une requête AJAX pour récupérer les nouvelles données de netstat -e
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = xhr.responseText;

                        // Extrait les bytes reçus et envoyés depuis la réponse
                        var receivedBytes = extractReceivedBytes(response);
                        var sentBytes = extractSentBytes(response);

                        // Met à jour les données des graphiques
                        updateChart(receivedBytes, sentBytes);
                    }
                }
            };
            xhr.open("GET", "bytes.php", true); // Assurez-vous d'avoir un fichier PHP nommé "netstat.php" qui exécute netstat -e et renvoie les résultats
            xhr.send();
        }

        function extractReceivedBytes(response) {
            // Extrait les bytes reçus de la réponse en utilisant une expression régulière
            var patternReceived = /Bytes\s+([0-9]+)/;
            var matchesReceived = response.match(patternReceived);
            if (matchesReceived && matchesReceived.length > 1) {
                return parseInt(matchesReceived[1]);
            }
            return 0;
        }



        function updateChart(receivedBytes, sentBytes) {
            // Met à jour les données des graphiques

            // Pour le graphique des bytes reçus
            chartReceived.data.datasets[0].data.push(receivedBytes);

            // Pour le graphique des bytes envoyés
            chartSent.data.datasets[0].data.push(sentBytes);

            // Met à jour les labels de temps avec la nouvelle valeur actuelle (vous pouvez utiliser une bibliothèque comme moment.js pour formater la date/heure)
            var currentTime = new Date().toLocaleTimeString();
            chartReceived.data.labels.push(currentTime);
            chartSent.data.labels.push(currentTime);

            // Limite le nombre de points de données affichés pour maintenir une fenêtre glissante
            var maxDataPoints = 10; // Modifier selon vos besoins
            if (chartReceived.data.labels.length > maxDataPoints) {
                chartReceived.data.labels.shift();
                chartReceived.data.datasets[0].data.shift();
            }
            if (chartSent.data.labels.length > maxDataPoints) {
                chartSent.data.labels.shift();
                chartSent.data.datasets[0].data.shift();
            }

            // Met à jour les graphiques
            chartReceived.update();
            chartSent.update();
        }

        // Crée le graphique des bytes reçus
        var ctxReceived = document.getElementById('chartReceived').getContext('2d');
        var chartReceived = new Chart(ctxReceived, {
            type: 'line',
            data: {
                labels: [], // Étiquettes de temps vides (seront mises à jour dynamiquement)
                datasets: [{
                    label: 'Bytes reçus',
                    data: [],
                    borderColor: 'blue',
                    backgroundColor: 'transparent',
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Évolution des bytes reçus'
                }
            }
        });

        // Crée le graphique des bytes envoyés
        var ctxSent = document.getElementById('chartSent').getContext('2d');
        var chartSent = new Chart(ctxSent, {
            type: 'line',
            data: {
                labels: [], // Étiquettes de temps vides (seront mises à jour dynamiquement)
                datasets: [{
                    label: 'Bytes envoyés',
                    data: [],
                    borderColor: 'green',
                    backgroundColor: 'transparent',
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Évolution des bytes envoyés'
                }
            }
        });

        // Met à jour les graphiques toutes les 5 secondes
        setInterval(fetchData, 5000);
</script>
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