<?php
    include_once('../assets/config/config.php');
    $sql = "SELECT * FROM game_lobby WHERE status='ACTIVE' LIMIT 100";
    $res = mysqli_query($myconn, $sql);
    $result = array();
    foreach($res as $re){
        array_push($result, $re['username']);
    }
    echo json_encode(array_reverse($result));
