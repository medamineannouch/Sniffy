<?php
    session_start();
    if(empty($_SESSION['logged_in']) || !$_SESSION['logged_in']){
        $_SESSION['login_failed'] = false;
        header('Location: ../login/loginpage.html');
        exit();
    }
?>

<html>
    <head>
        <title>Result</title>
        <link rel = "stylesheet" type = "text/css" href = "../style/result-style.css">
    </head>
    
    <body>
        <div class = "status-bar">
            <p class = "status-bar-username">
                <?php echo "Logged in as <u>".$_SESSION['username']."</u>"; ?>
            </p>
            <a class = "status-bar-logout" href = "../logout/logout.php">Logout</a>
        </div>
        <?php
            $protocol = $_POST['protocol'];
            echo "<h2>" . strtoupper($protocol) . " packets</h2>";
        ?>
        <div class = "content-box">
                <?php
                    $filter = $_POST['filter'];
                    $packetCount = $_POST['packetCount'];
                    if($filter == "all")
                        echo "<table style = 'width: 100%;'>";
                    else
                        echo "<table>";
                    
                    //Table header
                    echo "<tr>";
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
                    $pcapFile = 'C:\xampp\htdocs\project\Sniffy\V3\packetsmonitoring\output.pcap';

                    // Check if running on Windows
                    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') 
                    {
                        // Use the Windows version of tcpdump, which is WinDump
                        $tcpdump = 'C:\xampp\htdocs\project\Sniffy\V3\packetsmonitoring\windump.exe';
                        

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

                            $dateString = date("Y-m-d H:i:s", strtotime($timestamp));
                            $chunks1 = str_split($destinationMAC, 2);
                            $destinationMAC = implode(":", $chunks1);
                            $chunks2 = str_split($sourceMAC, 2);
                            $sourceMAC = implode(":", $chunks2);
                            echo "<tr>";
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
                        }

                        // Close the PCAP file
                        fclose($fileHandle);

                        //empty pcap file
                        $handle = fopen($pcapFile, 'w');
                        fclose($handle);

                        //close table
                        echo "</table>";
                    }

                    elseif (strtoupper(PHP_OS) === 'LINUX')
                    {
                            //Command to read packets and store them in a .pcap file
                            $cmd = "sudo tcpdump -i eth0 -w ".$pcapFile;
                            //Add packet count
                            $cmd = $cmd . " -c " . $packetCount;
                            //Decide which protocol to filter out
                            $cmd = $cmd . " " . $protocol;
                            //Execute command on shell
                            echo shell_exec($cmd);

                            //Commands specific for TCP packets
                            if($protocol == "tcp"){
                                exec($cmd . " | cut -d ' ' -f 1", $timestamp, $returnVal);
                                exec($cmd . " | cut -d ' ' -f 3 | cut -d '.' -f 1,2,3,4", $sourceIP, $returnVal);
                                exec($cmd . " | cut -d ' ' -f 3 | cut -d '.' -f 5", $sourcePort, $returnVal);
                                exec($cmd . " | cut -d ' ' -f 5 | cut -d '.' -f 1,2,3,4", $destinationIP, $returnVal);
                                exec($cmd . " | cut -d ' ' -f 5 | cut -d '.' -f 5 | cut -d ':' -f 1", $destinationPort, $returnVal);
                                exec($cmd . " -e | cut -d ' ' -f 2", $sourceMAC, $returnVal);
                                exec($cmd . " -e | cut -d ' ' -f 4 | cut -d ',' -f 1", $destinationMAC, $returnVal);
                                exec($cmd . " | awk '{print $(NF)}'", $packetLength, $returnVal);
                                exec($cmd . " | grep -v 'IP6' | cut -d ' ' -f 6- | rev | cut -d ' ' -f 1,2 --complement | cut -c 1 --complement | rev", $info, $returnVal);
                                for($i = 0; $i < sizeof($timestamp); $i += 1)
                                {
                                    echo "<tr>";
                                    if($filter == "timestamp" || $filter == "all"){
                                        echo "<td>".$timestamp[$i]."\n</td>";
                                    }
                                    if($filter == "sourceIP" || $filter == "all"){
                                        echo "<td>".$sourceIP[$i]."\n</td>";
                                    }
                                    if($filter == "sourcePort" || $filter == "all"){
                                        echo "<td>".$sourcePort[$i]."\n</td>";
                                    }
                                    if($filter == "destinationIP" || $filter == "all"){
                                        echo "<td>".$destinationIP[$i]."\n</td>";
                                    }
                                    if($filter == "destinationPort" || $filter == "all"){
                                        echo "<td>".$destinationPort[$i]."\n</td>";
                                    }
                                    if($filter == "sourceMAC" || $filter == "all"){
                                        echo "<td>".$sourceMAC[$i]."\n</td>";
                                    }
                                    if($filter == "destinationMAC" || $filter == "all"){
                                        echo "<td>".$destinationMAC[$i]."\n</td>";
                                    }
                                    if($filter == "packetLength" || $filter == "all"){
                                        echo "<td>".$packetLength[$i]."\n</td>";
                                    }
                                    if($filter == "all"){
                                        echo "<td>".$info[$i]."\n</td>";
                                    }
                                    echo "</tr>";
                                }
                            }
                        //Commands specific for UDP packets
                        else if($protocol == "udp")
                            {
                                exec($cmd . " | grep 'UDP' |grep -v 'NBT' | cut -d ' ' -f 1", $timestamp, $returnVal);
                                exec($cmd . " | grep 'UDP' | grep -v 'NBT' | cut -d ' ' -f 3 | cut -d '.' -f 1,2,3,4", $sourceIP, $returnVal);
                                exec($cmd . " | grep 'UDP' | grep -v 'NBT' | cut -d ' ' -f 3 | cut -d '.' -f 5", $sourcePort, $returnVal);
                                exec($cmd . " | grep 'UDP' | grep -v 'NBT' | cut -d ' ' -f 5 | cut -d '.' -f 1,2,3,4", $destinationIP, $returnVal);
                                exec($cmd . " | grep 'UDP' | grep -v 'NBT' | cut -d ' ' -f 5 | cut -d '.' -f 5 | cut -d ':' -f 1", $destinationPort, $returnVal);
                                exec($cmd . " -e | grep 'UDP' | grep -v 'NBT' | cut -d ' ' -f 2", $sourceMAC, $returnVal);
                                exec($cmd . " -e | grep 'UDP' | grep -v 'NBT' | cut -d ' ' -f 4 | cut -d ',' -f 1", $destinationMAC, $returnVal);
                                exec($cmd . " | grep 'UDP' | grep -v 'NBT' | awk '{print $(NF)}'", $packetLength, $returnVal);
                                exec($cmd . " | grep 'UDP' | grep -v 'NBT' | cut -d ' ' -f 6- | rev | cut -d ' ' -f 1,2 --complement | cut -c 1 --complement | rev", $info, $returnVal);
                                for($i = 0; $i < sizeof($timestamp); $i += 1)
                                {
                                    echo "<tr>";
                                    if($filter == "timestamp" || $filter == "all"){
                                        echo "<td>".$timestamp[$i]."\n</td>";
                                    }
                                    if($filter == "sourceIP" || $filter == "all"){
                                        echo "<td>".$sourceIP[$i]."\n</td>";
                                    }
                                    if($filter == "sourcePort" || $filter == "all"){
                                        echo "<td>".$sourcePort[$i]."\n</td>";
                                    }
                                    if($filter == "destinationIP" || $filter == "all"){
                                        echo "<td>".$destinationIP[$i]."\n</td>";
                                    }
                                    if($filter == "destinationPort" || $filter == "all"){
                                        echo "<td>".$destinationPort[$i]."\n</td>";
                                    }
                                    if($filter == "sourceMAC" || $filter == "all"){
                                        echo "<td>".$sourceMAC[$i]."\n</td>";
                                    }
                                    if($filter == "destinationMAC" || $filter == "all"){
                                        echo "<td>".$destinationMAC[$i]."\n</td>";
                                    }
                                    if($filter == "packetLength" || $filter == "all"){
                                        echo "<td>".$packetLength[$i]."\n</td>";
                                    }
                                    if($filter == "all"){
                                        echo "<td>".$info[$i]."\n</td>";
                                    }
                                    echo "</tr>";
                                }
                            }

                        //Commands specific for UDP packets
                        else if($protocol == "icmp")
                        {
                            exec($cmd . " | grep 'UDP' |grep -v 'NBT' | cut -d ' ' -f 1", $timestamp, $returnVal);
                            exec($cmd . " | grep 'UDP' | grep -v 'NBT' | cut -d ' ' -f 3 | cut -d '.' -f 1,2,3,4", $sourceIP, $returnVal);
                            exec($cmd . " | grep 'UDP' | grep -v 'NBT' | cut -d ' ' -f 3 | cut -d '.' -f 5", $sourcePort, $returnVal);
                            exec($cmd . " | grep 'UDP' | grep -v 'NBT' | cut -d ' ' -f 5 | cut -d '.' -f 1,2,3,4", $destinationIP, $returnVal);
                            exec($cmd . " | grep 'UDP' | grep -v 'NBT' | cut -d ' ' -f 5 | cut -d '.' -f 5 | cut -d ':' -f 1", $destinationPort, $returnVal);
                            exec($cmd . " -e | grep 'UDP' | grep -v 'NBT' | cut -d ' ' -f 2", $sourceMAC, $returnVal);
                            exec($cmd . " -e | grep 'UDP' | grep -v 'NBT' | cut -d ' ' -f 4 | cut -d ',' -f 1", $destinationMAC, $returnVal);
                            exec($cmd . " | grep 'UDP' | grep -v 'NBT' | awk '{print $(NF)}'", $packetLength, $returnVal);
                            exec($cmd . " | grep 'UDP' | grep -v 'NBT' | cut -d ' ' -f 6- | rev | cut -d ' ' -f 1,2 --complement | cut -c 1 --complement | rev", $info, $returnVal);
                            for($i = 0; $i < sizeof($timestamp); $i += 1)
                            {
                                echo "<tr>";
                                if($filter == "timestamp" || $filter == "all"){
                                    echo "<td>".$timestamp[$i]."\n</td>";
                                }
                                if($filter == "sourceIP" || $filter == "all"){
                                    echo "<td>".$sourceIP[$i]."\n</td>";
                                }
                                if($filter == "sourcePort" || $filter == "all"){
                                    echo "<td>".$sourcePort[$i]."\n</td>";
                                }
                                if($filter == "destinationIP" || $filter == "all"){
                                    echo "<td>".$destinationIP[$i]."\n</td>";
                                }
                                if($filter == "destinationPort" || $filter == "all"){
                                    echo "<td>".$destinationPort[$i]."\n</td>";
                                }
                                if($filter == "sourceMAC" || $filter == "all"){
                                    echo "<td>".$sourceMAC[$i]."\n</td>";
                                }
                                if($filter == "destinationMAC" || $filter == "all"){
                                    echo "<td>".$destinationMAC[$i]."\n</td>";
                                }
                                if($filter == "packetLength" || $filter == "all"){
                                    echo "<td>".$packetLength[$i]."\n</td>";
                                }
                                if($filter == "all"){
                                    echo "<td>".$info[$i]."\n</td>";
                                }
                                echo "</tr>";
                            }
                        }
                    }
                ?>
            <p><u>Note</u>:- Unsupported packets have been dropped</p>
        </div>
    </body>
    <footer>
    2023 ©  Travail réalisé par : INDIA-Groupe-4
    </footer>
</html>