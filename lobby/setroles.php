<?php
    session_start();
    error_reporting(0);
    include_once '../assets/config/config.php';
    $gameid = $_SESSION['HASH_GAME_ID'];
    $username = $_SESSION['SESSION_USERNAME'];

    if(mysqli_num_rows(mysqli_query($myconn, "SELECT * FROM active_game WHERE username='$username' AND gameid='$gameid'"))==1){
        $role = mysqli_fetch_assoc(mysqli_query($myconn, "SELECT * FROM active_game WHERE username='$username' AND gameid='$gameid'"))['role'];
        $_SESSION['SESSION_ROLE'] = $role;
        if(isset($_SESSION['SESSION_ROLE'])){
            echo '../ingame/testing-zone.php?gameid='.$_SESSION['HASH_GAME_ID'];
        }
    }else{
        echo 'Di Pa Kumpleto Puta';
    }
    $records = mysqli_query($myconn, "SELECT username, teamname, gameid FROM players WHERE gameid='$gameid' ORDER BY teamname, rand()");
    $r = mysqli_fetch_assoc(mysqli_query($myconn, "SELECT * FROM active_lobby WHERE gameid = '$gameid'"));
    $maxplayers = $r['maxplayers'] * $r['teams'];
    $_SESSION['MAX_PLAYERS'] = $maxplayers;
    $playercount = mysqli_num_rows(mysqli_query($myconn, "SELECT * FROM players WHERE gameid='$gameid' AND teamname!=''"));

    if($maxplayers == $playercount){
        if(mysqli_num_rows(mysqli_query($myconn, "SELECT * FROM active_game WHERE gameid='$gameid'")) == $maxplayers-1){
            mysqli_query($myconn, "DELETE FROM players WHERE gameid='$gameid'");
        }elseif(mysqli_num_rows(mysqli_query($myconn, "SELECT * FROM  active_game WHERE gameid='$gameid'")) == 0){
            $maxplayers = mysqli_fetch_assoc(mysqli_query($myconn, "SELECT * FROM players WHERE gameid='$gameid' AND position='HOST'"))['maxplayers'];
            $counter = 0;
            $previous = array();
            while($row = mysqli_fetch_assoc($records)){
                $counter++;
                $username = $row['username'];
                $teamname = $row['teamname'];
                $gameid = $row['gameid'];
                if($row['teamname'] != $previous['teamname']){
                    $counter = 1;
                    $role = 'general';
                }elseif ($maxplayers == 4 && $counter < 4 ){
                    $role = 'navigator';
                }elseif ($maxplayers > 4 && $counter <= 4){
                    $role = 'navigator';
                }else{
                    $role = 'decoder';
                }
                mysqli_query($myconn, "INSERT INTO active_game(gameid, role, username, teamname) VALUES('$gameid', '$role', '$username', '$teamname')");

                $previous = $row;
            }
            $change_game_status = mysqli_query($myconn, "UPDATE active_lobby SET status = 'IN GAME' WHERE gameid = '$gameid'");
        }
    }
