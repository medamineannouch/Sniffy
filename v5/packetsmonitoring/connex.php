<?php


function deleteDataFileIfNeeded()
{
    if (isset($_GET['reset']) && $_GET['reset'] === 'true') {
        $filename = 'netstat_data.json';
        
        file_put_contents($filename, '');
    }
}
deleteDataFileIfNeeded();



// Fonction pour sauvegarder les données dans le fichier
function saveData($data)
{
    $filename = 'netstat_data.json';
    $json = json_encode($data);
    file_put_contents($filename, $json);
}

// Exécute la commande netstat -n et récupère les résultats
$command = 'netstat -n';
$output = shell_exec($command);


// Parse les résultats et construit un tableau de données
$data = [];

$lines = explode("\n", $output);
for ($i = 4; $i < count($lines); $i++) {
    $fields = preg_split('/\s+/', $lines[$i]);
    if (count($fields) >= 4) {
        $proto = $fields[1];
        $localAddr = $fields[2];
        $foreignAddr = $fields[3];
        $state = $fields[4];


        if (strpos($localAddr, '[') !== false || strpos($localAddr, ']') !== false ||
        strpos($foreignAddr, '[') !== false || strpos($foreignAddr, ']') !== false) {
        continue;
    }
        $source= explode(':',$fields[2]);
        $ipsource=$source[0];
        $portsource=$source[1];

        $dest= explode(':',$fields[3]);
        $ipdest=$dest[0];
        $portdest=$dest[1];




        $data[] = [
            'proto' => $proto,
            'localAddr' => $ipsource,
            'sourceport'=> $portsource,
            'foreignAddr' => $ipdest,
            'destport'=> $portdest,
            'state' => $state,
        ];
    }
}



// Enregistre les données fusionnées
saveData($data);

// Convertit le tableau de données en JSON et renvoie la réponse
header('Content-Type: application/json');
echo json_encode($data);
?>
