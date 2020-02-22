<?php
    session_start();
    include_once('../assets/config/config.php');
    $id = $_SESSION['HASH_GAME_ID'];
    $sql = "SELECT * FROM players WHERE gameid = '$id'";
    $res = mysqli_query($myconn, $sql);
    $result = array();
    foreach($res as $re){
        array_push($result, $re['username']);
    }
    echo json_encode(array_reverse($result));
    $r = mysqli_fetch_assoc(mysqli_query($myconn, "SELECT * FROM active_lobby WHERE gameid = '$id'"));
    $maxplayers = $r['maxplayers'] * $r['teams'];
    $playercount = mysqli_num_rows(mysqli_query($myconn, "SELECT * FROM players WHERE gameid='$id' AND teamname!=''"));

    if($playercount == $maxplayers) {
        header('location: setroles.php');
    }