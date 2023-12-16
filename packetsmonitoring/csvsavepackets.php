<?php
    session_start();
    $csvContent = '';
    $target_file = $_SESSION['username']."\tpackets\t" . date('d-m-y').'.csv';
    for ($i = 0; $i < count($_SESSION['$CSVRAW']); $i++) {
        if (($i + 1) % 10 == 0) {
            $csvContent .= '"' . $_SESSION['$CSVRAW'][$i] . "\"\n";
        } else {
            $csvContent .= '"' . $_SESSION['$CSVRAW'][$i] . '",';
        }
    }
    header('Content-Type: text/csv');
    header("Content-Disposition: attachment; filename=$target_file");
    header('Content-Length: ' . strlen($csvContent));

    // Write file content to the output stream
    echo $csvContent;
    exit;
?>
