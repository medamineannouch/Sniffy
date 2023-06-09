<?php
    session_start(); //Started at login/login/login.php
    if(empty($_SESSION['logged_in']) || !$_SESSION['logged_in']){
        $_SESSION['login_failed'] = false;
        header('Location: ../login/login.php');
        exit();
    }

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

        <div class="table-container" style="height: 500px; /* Définissez la hauteur souhaitée pour la table */
    overflow: auto;">

<table class='table-hover table-active table-bordered' style = 'width: 100%; text-align:center;'>
    <thead>
        <tr class='table-info'>
            <th>Protocol</th>
            <th>source ip Address</th>
            <th>source port</th>

            <th>Destination ip Address</th>
            <th>destination port</th>

            <th>Connexion State</th>
        </tr>
    </thead>
    <tbody id="tcpTableBody">
    </tbody>
</table>
</div>
<br>
<br>
<br>

<button id="stopButton">Arrêter</button>
<button id="refreshButton">Rafraîchir</button>

<br>
<br>
<br>

<table class="custom-table">
  <thead>
    <tr>
      <th style="text-align: center;">État</th>
      <th style="text-align: center;">Description</th>
    </tr>
  </thead>
  <tbody>
  <tr>
      <td>ESTABLISHED</td>
      <td>Cet état indique que la connexion réseau est active et établie avec succès entre deux hôtes. Les données peuvent être échangées entre les deux extrémités de la connexion.</td>
    </tr>
    <tr>
      <td>LISTEN</td>
      <td>Lorsqu'un service ou une application écoute sur un port spécifique, il est dans l'état d'écoute. Cela signifie qu'il attend des connexions entrantes sur ce port.</td>
    </tr>
    <tr>
      <td>TIME_WAIT</td>
      <td>Après la fermeture d'une connexion établie, elle entre dans l'état TIME_WAIT. Cela garantit que toutes les données perdues ou retardées peuvent être reçues avant que la connexion soit entièrement terminée.</td>
    </tr>
    <tr>
      <td>CLOSE_WAIT</td>
      <td>Lorsqu'une connexion est fermée par l'hôte distant, mais que l'application locale n'a pas encore confirmé la fermeture, elle est dans l'état CLOSE_WAIT. Cela peut se produire lorsque l'application locale n'a pas encore exécuté les étapes de fermeture nécessaires.</td>
    </tr>
    <tr>
      <td>SYN_SENT</td>
      <td>Lorsqu'un client envoie une demande de connexion à un serveur distant, il se trouve dans l'état SYN_SENT. Cela signifie que la demande de connexion SYN a été envoyée, mais la réponse SYN+ACK n'a pas encore été reçue.</td>
    </tr>
    <tr>
      <td>SYN_RECEIVED</td>
      <td>Lorsqu'un serveur reçoit une demande de connexion SYN d'un client, il passe dans l'état SYN_RECEIVED. Cela indique que le serveur a reçu la demande SYN et a envoyé une réponse SYN+ACK en retour.</td>
    </tr>
    <tr>
      <td>CLOSED</td>
      <td>Lorsqu'une connexion est entièrement terminée et n'est plus active, elle est dans l'état CLOSED. Cela signifie qu'aucun échange de données n'est possible sur cette connexion.</td>
    </tr>  </tbody>
</table>
<br>
<br>
<br>
<div>
                    
<p>
    <?php $_SESSION['CSVRAW'] = $CSVRAW ; ?> 
    <button onclick="window.location.href = 'evolution.php';" >Statistiques</button>
    <button id="saveButton" onclick="window.location.href = 'importmode.php';" >Save</button>


</p>

</div>
       </main>
       

       <script>
    var fetchTimer;

    function fetchNetstatData() {
        $.ajax({
            url: 'connex.php',
            success: function(response) {
                updateTable(response);
            },
            complete: function() {
                // Répète l'appel toutes les 30 secondes
                fetchTimer = setTimeout(fetchNetstatData, 30000);
            }
        });
    }

    function updateTable(data) {
        var tcpTableBody = $('#tcpTableBody');
        tcpTableBody.empty();

        // Ajoute chaque nouvelle ligne de données au début du corps du tableau
        data.forEach(function(row) {
            tcpTableBody.prepend('<tr><td>' + row.proto + '</td><td>' + row.localAddr + '</td><td>' + row.sourceport + '</td><td>' + row.foreignAddr + '</td><td>' + row.destport + '</td><td>' + row.state + '</td></tr>');
        });

        
    }
    function saveVisibleRowsToDatabase() {
        var visibleRows = $('#tcpTableBody').find('tr'); // prendre tous les lignes de la table
        var data = [];

        // extraire les donnees
        visibleRows.each(function() {
            var row = $(this);
            var rowData = {
                proto: row.find('td:eq(0)').text(),
                localAddr: row.find('td:eq(1)').text(),
                sourceport: row.find('td:eq(2)').text(),
                foreignAddr: row.find('td:eq(3)').text(),
                destport: row.find('td:eq(4)').text(),
                state: row.find('td:eq(5)').text()
            };
            data.push(rowData);
        });

        // envoyer les donnees
        $.ajax({
            url: 'sqlsavepackets.php',
            method: 'POST',
            data: { data: JSON.stringify(data) },
            success: function(response) {
                console.log('Data saved successfully');
            },
            error: function(xhr, status, error) {
                console.error('Error saving data: ' + error);
            }
        });
        $.ajax({
            url: 'csvsavepackets.php',
            method: 'POST',
            data: { data: JSON.stringify(data) },
            success: function(response) {
                console.log('Data exported successfully');
            },
            error: function(xhr, status, error) {
                console.error('Error saving data: ' + error);
            }
        });
    }


    $(document).ready(function() {
        $('#refreshButton').click(function() {
            fetchNetstatData();
        });

        $('#stopButton').click(function() {
            stopFetchingData();
        });

        function stopFetchingData() {
            clearTimeout(fetchTimer);
        }
        $('#saveButton').click(function() {
            saveAllDataToDatabase();
        });

        // Lance la récupération des données dès le chargement de la page
        fetchNetstatData();
    });
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