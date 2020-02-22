<?php
	session_start();
	$id = $_SESSION['HASH_GAME_ID'];    
	$r = mysqli_fetch_assoc(mysqli_query($myconn, "SELECT * FROM active_lobby WHERE gameid = '$id'"));
    $maxplayers = $r['maxplayers'] * $r['teams'];
    $playercount = mysqli_num_rows(mysqli_query($myconn, "SELECT * FROM players WHERE gameid='$id' AND teamname!=''"));

    if($playercount == $maxplayers) {
        header('location: setroles.php');
    }
