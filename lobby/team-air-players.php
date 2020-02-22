<?php
    session_start();
    include_once('../assets/config/config.php');

    $id = $_SESSION['HASH_GAME_ID'];
    $sql = "SELECT * FROM players WHERE gameid = '$id' AND teamname='WIND'";
    $res = mysqli_query($myconn, $sql);
    $result = array();
    foreach($res as $re){
        array_push($result, $re['username']);
    }
    echo json_encode(array_reverse($result));

