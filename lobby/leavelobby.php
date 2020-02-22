<?php
    session_start();
    include '../assets/config/config.php';
    include '../assets/config/sanitizer.php';
    $id = $_GET['gameid'];
    $creator = $_GET['creator'];
    $username = $_SESSION['SESSION_USERNAME'];

    $checkid = mysqli_query($myconn, "SELECT * FROM players WHERE hash_id='$id'");
    if(mysqli_num_rows($checkid) > 0){
        while($row = mysqli_fetch_array($checkid)){
            $unhash_id = $row['gameid'];
        }
        $checknumplayers = mysqli_query($myconn, "SELECT * FROM active_lobby WHERE gameid='$unhash_id' AND creator='$creator'");
        if(mysqli_num_rows($checknumplayers) > 0){
            while($row1 = mysqli_fetch_array($checknumplayers)){
                $numplayers = $row1['players'];
            }
            echo $unhash_id;
            if($numplayers == 1){
                $deletelobby = mysqli_query($myconn, "DELETE FROM active_lobby WHERE gameid='$unhash_id' AND creator='$creator'");
                $leave = mysqli_query($myconn, "DELETE FROM players WHERE username='$username' AND hash_id='$id'");
                header('location: global-lobby.php');
            }
            else{
                $num = $numplayers - 1;
                $deletelobby = mysqli_query($myconn, "UPDATE active_lobby SET players = '$num' WHERE gameid='$unhash_id' AND creator='$creator'");
                $leave = mysqli_query($myconn, "DELETE FROM players WHERE username='$username' AND hash_id='$id'");
                header('location: global-lobby.php');
            }
        }
        else{
            header('location: global-lobby.php');
        }
    }
    else{
        header('location: global-lobby.php');
    }

