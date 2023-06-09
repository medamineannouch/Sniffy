
<?php
// Exécute la commande netstat -e et récupère les résultats
$command = 'netstat -e';
$output = shell_exec($command);

// Retourne les résultats
echo $output;
?>
