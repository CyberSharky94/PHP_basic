<?php
    if(isset($_POST['ip']))
    {
        $ip = $_POST['ip'];

        pinger($_POST['ip']);
    } else {
        echo json_encode('ip not found');
    }

    function pinger($address){
        if(strtolower(PHP_OS)=='winnt'){
            $command = "ping -n 1 $address";
            exec($command, $output, $status);

            if(strpos(strtolower($output[5]), 'received = 1'))
            {
                echo json_encode('success');
            } else {
                echo json_encode('failed');
            }
        }else{
            $command = "ping -c 1 $address";
            exec($command, $output, $status);
        }
        if($status === 0){
            return true;
        }else{
            return false;
        }
    }
?>