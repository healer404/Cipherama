<?php
    include_once('../assets/config/config.php');

    $sql = "SELECT * FROM active_lobby WHERE status = 'WAITING' AND players != 0 ORDER BY id DESC LIMIT 20";
    $res = mysqli_query($myconn, $sql);
    $result = array();
    foreach($res as $re){
        array_push($result, array('creator'=>$re['creator'],'gameid'=>$re['gameid'], 'players'=>$re['players'], 'maxplayers'=>$re['maxplayers']*$re['teams']));
    }
    echo json_encode(array_reverse($result));

