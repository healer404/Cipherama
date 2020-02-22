<?php
    session_start();
    if(isset($_POST['addlobby'])){
        include '../assets/config/config.php';
        include '../assets/config/sanitizer.php';

        $numplayers = sanitize($_POST['numplayers']);
        $numteams = sanitize($_POST['numteams']);

        if(strlen($numplayers) == 0){
            header('location: index.php');
        }
        else{
            if($numplayers >= 2 && $numplayers <= 9){
                $_SESSION['NUMPLAYERS'] = $numplayers;
            }
            else{
                header('location: index.php');
            }
        }

        if(strlen($numteams) == 0){
            header('location: index.php');
        }
        else{
            if($numteams >= 2 && $numteams <= 9){
                $_SESSION['NUMTEAMS'] = $numteams;
            }
            else{
                header('location: index.php');
            }
        }

        if(isset($_SESSION['NUMPLAYERS']) && isset($_SESSION['NUMTEAMS'])){
            $max = $numplayers * $numteams;
            if($max <= 36){
                $username = $_SESSION['SESSION_USERNAME'];
                $gameid = $_SESSION['GAMEID'];
                $status = "WAITING";
                $save = mysqli_query($myconn, "INSERT INTO active_lobby (players, maxplayers, teams, creator, gameid, status) VALUES ('1', '$numplayers', '$numteams', '$username', '$gameid', '$status')");
                if($save){
                    $hashid = password_hash($gameid, PASSWORD_BCRYPT);
                    $save1 = mysqli_query($myconn, "INSERT INTO players (gameid, teamname, username, maxplayers, hash_id, position ) VALUES ('$gameid', '', '$username','$numplayers', '$hashid', 'HOST')");
                    if($save1){
                        echo "saved successfully";
                        header('location: gamelobby.php?gameid='. $hashid .'&creator='.$username);
                    }
                }
            }
            else{
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

