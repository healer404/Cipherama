<?php
    include_once('../assets/config/config.php');
    $sql = "SELECT * FROM chat_lobby ORDER BY id DESC LIMIT 10";
    $res = mysqli_query($myconn, $sql);
    $result = array();
    $message = '';
    foreach($res as $re){
      $message = $re['message'];
        if(strlen($re['message']) > 30){
          for($i = 30; $i <= 150 && $i < strlen($re['message']); $i+=30){
            $message = substr_replace($message, '<br>', $i, 0);
          }
        }
        array_push($result, array('username'=>$re['username'], 'message'=>$message));
    }
    echo json_encode(array_reverse($result));
