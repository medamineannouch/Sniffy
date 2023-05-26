<?php
    session_start();
    $target_file = fopen("saves/" . $_SESSION['username']. date('d-m-y').'.csv', 'a+');
    for($i=0;$i<count($_SESSION['$CSVRAW']);$i++){
        if(($i+1)%9 == 0){
            fwrite($target_file,'"'.$_SESSION['$CSVRAW'][$i]."\"\n");
        }else{
            fwrite($target_file,'"'.$_SESSION['$CSVRAW'][$i].'",');
        }
    }
    fclose($target_file);
    $_SESSION['imported'] = "csv";
    header('location:importmode.php');
?>
