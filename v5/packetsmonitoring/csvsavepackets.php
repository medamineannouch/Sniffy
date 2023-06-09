
<?php
    session_start();

    $target_file = $_SESSION['username']."\tpackets\t" . date('d-m-y').'.csv';

    $data = $_POST['data'];

    $rows = json_decode($data, true);

    $csvContent = '';
    foreach ($rows as $row) {
        $csvContent .= '"' . implode('","', $row) . '"' . PHP_EOL;
    }


    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $target_file . '"');
    header('Content-Length: ' . strlen($csvContent));

    echo $csvContent;

?>
