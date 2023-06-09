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
               <script src="https://unpkg.com/chart.js"></script>

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
        <?php
            $protocol = $_POST['protocol'];
           // echo "<h2 style="."border: 5px solid #8167a9; border-radius: 10px; padding: 3px; ".">" . strtoupper($protocol) . " packets</h2>";
        ?>
        <div class = "content-box">
                <?php
                    $filter = $_POST['filter'];
                    $packetCount = $_POST['packetCount'];
            
                   //get ip address
                        $hostname = gethostname();
                        $ipAddress = gethostbyname($hostname);
            
                try {
                    $pcapFile = 'C:\wamp64\www\Sniffy\updatedversion\packetsmonitoring\output.pcap'; //charaf
                } catch (\Throwable $th) {
                    $pcapFile = 'C:\xampp\htdocs\project\Sniffy\V3\packetsmonitoring\output.pcap'; //medamine
                }

                    
                    // Check if running on Windows
                    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') 
                    {
                        if($filter == "all")
                            echo "<table class='table-hover table-active table-bordered' style = 'width: 100%; text-align:center;'>";
                        else
                            echo "<table>";
                        
                        //Table header
                        echo "<tr class='table-info'>";
                        echo "<th>Protocol</th>";

                        if($filter == "timestamp" || $filter == "all"){
                            echo "<th>Timestamp</th>";
                        }
                        if($filter == "sourceIP" || $filter == "all"){
                            echo "<th>Source IPv4</th>";
                        }
                        if($filter == "sourcePort" || $filter == "all"){
                            echo "<th>Source Port</th>";
                        }
                        if($filter == "destinationIP" || $filter == "all"){
                            echo "<th>Destination IPv4</th>";
                        }
                        if($filter == "destinationPort" || $filter == "all"){
                            echo "<th>Destination Port</th>";
                        }
                        if($filter == "sourceMAC" || $filter == "all"){
                            echo "<th>Source MAC</th>";
                        }
                        if($filter == "destinationMAC" || $filter == "all"){
                            echo "<th>Destination MAC</th>";
                        }
                        if($filter == "packetLength" || $filter == "all"){
                            echo "<th>Packet length</th>";
                        }
                    
                        echo "</tr>";
                        
                        // Use the Windows version of tcpdump, which is WinDump
                        try {
                            //charaf
                            $tcpdump = 'C:\wamp64\www\Sniffy\updatedversion\packetsmonitoring\windump.exe'; //Updated the path to adapt with WampServer
                        } catch (\Throwable $th) {
                            // $tcpdump = 'C:\xampp\htdocs\project\Sniffy\V3\packetsmonitoring\windump.exe'; //medamine
                        }

                        //Add packet count
                        
                        $cmd = $tcpdump . ' -c ' . $packetCount . ' -Z ' . $protocol . ' -w "' . $pcapFile . '"';
                        //Execute command on shell
                        echo shell_exec($cmd);

                        // Open the pcap file for reading
                        $fileHandle = fopen($pcapFile, 'rb');
                        
                        if (!$fileHandle) {
                            die("Error opening pcap file");
                        }

                        // Read the pcap file header (24 bytes)
                        $header = fread($fileHandle, 24);

                        // Parse the pcap file header
                        $magicNumber = unpack('V', substr($header, 0, 4))[1];
                        if ($magicNumber !== 0xA1B2C3D4) {
                            die("Invalid pcap file format");
                        }

                        $isLittleEndian = ($magicNumber === 0xD4C3B2A1);
                        $majorVersion = unpack('v', substr($header, 4, 2))[1];
                        $minorVersion = unpack('v', substr($header, 6, 2))[1];
                        $gmtOffset = unpack('V', substr($header, 8, 4))[1];
                        $timestampAccuracy = unpack('V', substr($header, 12, 4))[1];
                        $snapshotLength = unpack('V', substr($header, 16, 4))[1];
                        $networkType = unpack('V', substr($header, 20, 4))[1];

                        // Loop through each packet in the pcap file
                        while (!feof($fileHandle)) {
                            // Read the packet header (16 bytes)
                            $packetHeader = fread($fileHandle, 16);

                            // Check if end of file is reached
                            if (strlen($packetHeader) !== 16) {
                                break;
                            }

                            // Parse the packet header
                            $timestampSeconds = unpack('V', substr($packetHeader, 0, 4))[1];
                            $timestampMicroseconds = unpack('V', substr($packetHeader, 4, 4))[1];
                            $capturedLength = unpack('V', substr($packetHeader, 8, 4))[1];
                            $originalLength = unpack('V', substr($packetHeader, 12, 4))[1];

                            // Read the packet data
                            $packetData = fread($fileHandle, $capturedLength);

                            // Extract the packet information
                            $timestamp = $timestampSeconds + ($timestampMicroseconds / 1000000);
                            $sourceIP = ord($packetData[26]).".".ord($packetData[27]).".".ord($packetData[28]).".".ord($packetData[29]);
                            $sourcePort = unpack('n', substr($packetData, 34, 2))[1];
                            $destinationIP = ord($packetData[30]).".".ord($packetData[31]).".".ord($packetData[32]).".".ord($packetData[33]);
                            $destinationPort = unpack('n', substr($packetData, 36, 2))[1];
                            $sourceMAC = bin2hex(substr($packetData, 6, 6));
                            $destinationMAC = bin2hex(substr($packetData, 0, 6));
                            $packetLength = $capturedLength;

                            $dateString = date("Y-m-d H:i:s", $timestamp);
                            $chunks1 = str_split($destinationMAC, 2);
                            $destinationMAC = implode(":", $chunks1);
                            $chunks2 = str_split($sourceMAC, 2);
                            $sourceMAC = implode(":", $chunks2);
                            echo "<tr>";
                            echo "<td>".$protocol."\n</td>";
                            if($filter == "timestamp" || $filter == "all"){
                                echo "<td>".$dateString."\n</td>";
                            }
                            if($filter == "sourceIP" || $filter == "all"){
                                echo "<td>".$sourceIP."\n</td>";
                            }
                            if($filter == "sourcePort" || $filter == "all"){
                                echo "<td>".$sourcePort."\n</td>";
                            }
                            if($filter == "destinationIP" || $filter == "all"){
                                echo "<td>".$destinationIP."\n</td>";
                            }
                            if($filter == "destinationPort" || $filter == "all"){
                                echo "<td>".$destinationPort."\n</td>";
                            }
                            if($filter == "sourceMAC" || $filter == "all"){
                                echo "<td>".$sourceMAC."\n</td>";
                            }
                            if($filter == "destinationMAC" || $filter == "all"){
                                echo "<td>".$destinationMAC."\n</td>";
                            }
                            if($filter == "packetLength" || $filter == "all"){
                                echo "<td>".$packetLength."\n</td>";
                            }
                            
                            echo "</tr>";  
                            
                            // Vérifiez si l'adresse IP source correspond à l'adresse IP spécifique 
                            if ($sourceIP == $ipAddress ) {
                                $direction = 'sent'; // Paquet émis
                            } else {
                                $direction = 'received'; // Paquet reçu
                            }

                            if ($direction == 'sent') {
                                $sentPacketSizes[] = $packetLength;
                                $sentTimestamps[] = $dateString;
                            } elseif ($direction == 'received') {
                                $receivedPacketSizes[] = $packetLength;
                                $receivedTimestamps[] = $dateString;
                            }
                            //! if the save buttion is pressed || TODO fix the Timestamp from the PcapFile
                            //timestamp is fixed !!
                            array_push($CSVRAW,$_SESSION['username'],$protocol,$dateString,$sourceIP,$sourcePort,$destinationIP,$destinationPort,$sourceMAC,$destinationMAC,$packetLength); 
                        }
                        $sentPacketSizesJson = json_encode($sentPacketSizes);
                        $sentTimestampsJson = json_encode($sentTimestamps);
                        $receivedPacketSizesJson = json_encode($receivedPacketSizes);
                        $receivedTimestampsJson = json_encode($receivedTimestamps);
                        
                        // Close the PCAP file
                        fclose($fileHandle);

                        //empty pcap file
                        $handle = fopen($pcapFile, 'w');
                        fclose($handle);

                        //close table
                        echo "</table>";
                    
                    }
                ?>

               
            <p><u>Note</u>:- Unsupported packets have been dropped</p>
        </div>
           <canvas id="sentPacketsChart"></canvas>
        <canvas id="receivedPacketsChart"></canvas>
        <div>
                    
                    <p>
                        <?php $_SESSION['$CSVRAW'] = $CSVRAW ; ?> 
                        <a href="importmode.php" target="_blank" role="button" class="btn btn-primary " style="background-color: #8167a9; border-color: #8167a9; ">Save </a>
                    
                        <!--I have modified the "retry" so it repeats the process with the same config -->

                        <a href="requirements.php" role="button" class="btn btn-primary " style="background-color: #8167a9; border-color: #8167a9; ">Retry </a>
                    </p>

                </div>
        </main>
    <script>
    var sentpacketSizes = <?php echo $sentPacketSizesJson; ?>;
    var senttimestamps = <?php echo $sentTimestampsJson; ?>;

    // Créer le graphique à barres avec Chart.js
    var ctx = document.getElementById('sentPacketsChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: senttimestamps,
            datasets: [{
                label: 'Taille des paquets envoyés',
                data: sentpacketSizes,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });



    /////////////////////

    var recpacketSizes = <?php echo $receivedPacketSizesJson; ?>;
    var rectimestamps = <?php echo $receivedTimestampsJson; ?>;

    // Créer le graphique à barres avec Chart.js
    var ctx = document.getElementById('receivedPacketsChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: rectimestamps,
            datasets: [{
                label: 'Taille des paquets reçus',
                data: recpacketSizes,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
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
