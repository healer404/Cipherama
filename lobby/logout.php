<?php
    session_start();
    $username = $_SESSION['SESSION_USERNAME'];
    $timezone = date_default_timezone_set('Asia/Manila');
    $logged_in_time = $_SESSION['LOGGED_IN_TIME'];
    $date = date('M/d/Y h:i:s a', time());
    include_once ('../assets/config/config.php');
    $status = "INACTIVE";
    $unhash_id = $_SESSION['HASH_GAME_ID'];
    $checknumplayers = mysqli_query($myconn, "SELECT * FROM active_lobby WHERE gameid='$unhash_id'");
    if(mysqli_num_rows($checknumplayers) > 0){
        while($row1 = mysqli_fetch_array($checknumplayers)){
            $numplayers = $row1['players'];
        }
        echo $unhash_id;
        if($numplayers == 1){
            $deletelobby = mysqli_query($myconn, "DELETE FROM active_lobby WHERE gameid='$unhash_id'");
            $leave = mysqli_query($myconn, "DELETE FROM players WHERE username='$username'");
            header('location: ../index.php');
        }
        else{
            $num = $numplayers - 1;
            $deletelobby = mysqli_query($myconn, "UPDATE active_lobby SET players = '$num' WHERE gameid='$unhash_id'");
            $leave = mysqli_query($myconn, "DELETE FROM players WHERE username='$username'");
            header('location: ../index.php');
        }
    }
    else{
        header('location: ../index.php');
    }
    $logged_out_time = mysqli_query($myconn, "UPDATE account_logs  SET logged_out = '$date' WHERE username ='$username' AND logged_in = '$logged_in_time'");
    $logged_out_now = mysqli_query($myconn, "UPDATE game_lobby SET status = '$status' WHERE username = '$username'");
    $delete_from_lobby = mysqli_query($myconn, "DELETE FROM players WHERE username = '$username'");
    if($logged_out_time && $logged_out_now){
        header('location: ../index.php');
        session_destroy();
    }
    else{
        echo "adsjakd";
    }
