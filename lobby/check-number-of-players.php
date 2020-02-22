<?php
    session_start();
    include_once'../assets/config/config.php';

    $gameid = $_SESSION['HASH_GAME_ID'];

    $result = mysqli_fetch_assoc(mysqli_query($myconn, "SELECT * FROM active_lobby WHERE gameid = '$gameid'"));
    $maxplayers = $result['maxplayers'] * $result['teams'];
    $playercount = mysqli_num_rows(mysqli_query($myconn, "SELECT * FROM players WHERE gameid='$gameid' AND teamname!=''"));
    echo $playercount;
    if($playercount == $maxplayers) {
        header('location: setroles.php');
    }
