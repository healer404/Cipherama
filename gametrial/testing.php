<?php
include '../assets/ciphers/FunctionCipher.php';
include 'phpgameassets/config/config.php';

$ciphers = array('CaesarEncrypt','RailFenceEncrypt', 'PolybiusEncrypt', 'Base64Encrypt', 'SGAEncrypt', 'BrailleEncrypt', 'MorseEncrypt', 'AtbashEncrypt', 'Latin_Alphabet', 'BinaryEncrypt', 'BaconianEncrypt', 'skipCipher', 'Transposition', 'strToHex');
$result = mysqli_query($myconn, "SELECT * FROM traps ORDER BY RAND() LIMIT 10");

$traps = array();
while($row = mysqli_fetch_assoc($result)){
    $plaintext = $row['plaintext'];
    $cipher = $ciphers[rand(0, count($ciphers)-1)];
    $shift = 0;
    if($cipher == 'CaesarEncrypt'){
        $shift = rand(1, 25);
    }elseif ($cipher == 'RailFenceEncrypt'){
        $shift = rand(2, 10);
    }

    if($cipher == 'CaesarEncrypt' || $cipher == 'RailFenceEncrypt'){
        $encrypted = call_user_func($cipher, $plaintext, $shift);
    }else{
        $encrypted = call_user_func($cipher, $plaintext);
    }
    array_push($traps, array('encrypted'=>$encrypted, 'plaintext'=>$plaintext, 'cipher'=>$cipher, 'shift'=>$shift));
}

foreach ($traps as $trap){
    echo $trap['plaintext'].'<br>'.$trap['encrypted'].'<br>'.$trap['cipher'].'<br>'.$trap['shift'].'<hr>';
}
