<?php
    session_start();
    if(!isset($_SESSION['SESSION_USERNAME']) && !isset($_SESSION['SESSION_ID'])){
        header('location: ../lobby/global-lobby.php');
    }
    $id = $_SESSION['HASH_GAME_ID'];
    $team = $_SESSION['SESSION_TEAM'];
    ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Cipherama">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Cipherama | <?php echo date('Y')?></title>
    <link rel="icon" href="../assets/img/PUPLogo.png" type="text/css">
    <link href="phpgameassets/3.4.1.bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="phpgameassets/js/panzoom.min.js"></script>
    <link rel="stylesheet" href="phpgameassets/css/commander.css" type="text/css">
</head>
<body>
<div class="col-md-12 margin-off">
    <div class="col-md-12 margin-off">
        <div class="col-md-9 sub-custom-container">
            <div class="world-map-visual">
                <table id="map" class="table map">
                    <?php for($i = 0; $i < 10; $i++){?>
                        <tr><?php
                            include '../assets/config/config.php';
                            for($j = 0; $j < 10; $j++){
                                $game_location = $i.$j;
                                $display_base = mysqli_query($myconn, "SELECT * FROM actual_game_configurations WHERE gameid = '$id' AND teamname = '$team' AND status = 'SETTED' AND baseloc = '$game_location'");
                                $display_trap = mysqli_query($myconn, "SELECT * FROM briefing_room_traps WHERE gameid = '$id' AND teamname = '$team' AND status = 'SETTED' AND trapLocation = '$game_location'");
                                $display_player = mysqli_query($myconn, "SELECT * FROM active_game_players WHERE gameid = '$id' AND location = '$game_location' AND status = 'OKAY' OR status = 'TRIGGERED'");
                                if(mysqli_num_rows($display_base) > 0){
                                ?>
                                <td id="<?php echo $i.$j; ?>"><img src="phpgameassets/img/trainer.png" style="height:30px"></td>
                                <?php
                                }
                                elseif(mysqli_num_rows($display_player) > 0){
                                ?>
                                    <td id="<?php echo $i.$j; ?>"><img src="phpgameassets/img/trainer.png" style="height:30px"></td>
                            <?php
                                }
                                elseif(mysqli_num_rows($display_trap) > 0){
                                    ?>
                                    <td id="<?php echo $i.$j; ?>"><img src="phpgameassets/img/navigators.png" style="height:30px"></td>
                                    <?php
                                }
                                else{
                                    ?>
                                    <td id="<?php echo $i.$j?>"></td>
                            <?php
                                }
                            }
                                ?>
                        </tr>
                    <?php }?>
                </table>
            </div>
        </div>
        <div class="col-md-3 margin-less">
            <div class="gamechat-container col-md-12 margin-off">
                <div class="gamechat-container-header col-md-12">
                    <header><strong>Team Chat</strong></header>
                </div>
                <div class="gamechat-container-body col-md-12">
                    <?php // THIS IS WHERE THE CHATS WILL BE OUTPUT  ?>
                </div>
                <div class="gamechat-container-message col-md-12">
                    <form id="sendMessagess" action="send_message.php" method="post">
                        <div class="col-md-9 chat-box-container">
                            <input type="text" name="message" id="message" class="message-box" maxlength="100" autocomplete="off">
                        </div>
                        <div class="col-md-3 chat-send-container ">
                            <button class="btn btn-primary " id="sendMsg">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 margin-off">
        <div class="col-md-12 container-player-panel">
            <div class="col-md-2 margin-less">
                <div class="img-avatar margin-off">
                    <img src="phpgameassets/avatars/Wind-Komasneder.gif" alt="Wind Komasneder">
                </div>
            </div>
            <div class="col-md-1 margin-off">
                <div class="img-avatar margin-off">
                    <div class="col-md-12 gamechat-container-header">
                        <header><strong>MAP</strong></header>
                    </div>
                    <div class="col-md-12 margin-off">
                        <div class="col-md-4 btn-map-reset text-center">
                            <input value="Reset" type="button" class="btn btn-success" onclick="resetmap()">
                            <a href="game_dice_setter.php"><button class="btn btn-primary">END</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 margin-less">
                <div class="col-md-12 margin-off img-avatar">
                    <div class="col-md-10 margin-off">
                        <div class="general-mini-map margin-off">
                            <table>
                                <?php
                                include '../assets/config/config.php';
                                    for ($i = 0; $i < 10; $i++) {
                                        ?>
                                        <tbody>
                                        <tr>
                                            <?php
                                            for ($j = 0; $j < 10; $j++) {
                                                $location = $i.$j;
                                                $check_tested_trap = mysqli_query($myconn, "SELECT * FROM briefing_room_traps WHERE gameid = '$id' AND teamname = '$team' AND status = 'TESTED'");
                                                if(mysqli_num_rows($check_tested_trap) > 0){
                                                    while($row1 = mysqli_fetch_array($check_tested_trap)){
                                                        $_SESSION['TRAPID'] = $row1['trapId'];
                                                    }
                                                    $trapid = $_SESSION['TRAPID'];
                                                }
                                                $check_trap_loc = mysqli_query($myconn, "SELECT * FROM briefing_room_traps WHERE gameid = '$id' AND teamname = '$team' AND status = 'SETTED' AND trapLocation = '$location'");
                                                if(mysqli_num_rows($check_trap_loc) > 0){
                                            ?>
                                                        <td>
                                                            <form action="trysave.php" method="post">
                                                                <input type="hidden" name="move"
                                                                       value="<?php echo $i . $j; ?>">
                                                                <input type="submit" id="<?php echo $i . $j ?>"
                                                                       value=" " class="cell-button-trapped" name="settrap">
                                                            </form>
                                                        </td>
                                                        <?php
                                                    }
                                                    else{
                                                        ?>
                                                        <td>
                                                        <form action="trysave.php" method="post">
                                                            <input type="hidden" name="move"
                                                                   value="<?php echo $i . $j; ?>">
                                                            <input type="hidden" name="trapid" value="<?php echo $trapid; ?>">
                                                            <input type="submit" id="<?php echo $i . $j ?>"
                                                                   value=" " class="cell-button" name="settrap">
                                                        </form>
                                                        <?php
                                                    }
                                                        ?>
                                                    </td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                        </tbody>
                                        <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-2 margin-off text-center flag-text-container">
                        <h4 class="flag-text">
                            T<br>
                            R<br>
                            A<br>
                            P<br>
                            S<br>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4 margin-off">
                <div class="img-avatar col-md-12 margin-off ">
                    <div class="col-md-12 gamechat-container-header margin-off">
                        <header><strong>&nbsp;MISSION TRANSMISSION</strong></header>
                    </div>
                    <div class="col-md-12 margin-off briefing-container">
                        <div class="col-md-12 margin-off">
                            <div class="col-md-12 margin-less">
                                <form id="sendMessage" action="send_transmission.php" method="post">
                                <select name="trapId" style="width: 98%; padding: 10px; margin-bottom: 5px" class="text-center text-danger">
                                    <?php
                                        include '../assets/config/config.php';
                                        $enemy_trap_ids = mysqli_query($myconn, "SELECT * FROM briefing_room_traps WHERE gameid = '$id' AND teamname != '$team' AND status = 'SETTED' AND triggered_by !='' AND triggered_by_team = '$team'");
                                        if(mysqli_num_rows($enemy_trap_ids) > 0){
                                            while($row2 = mysqli_fetch_array($enemy_trap_ids)) {
                                                ?>
                                                <option class="panel-primary" style="min-width: 98%;" value="<?php echo $row2['trapId'];?>"><?php echo 'TRAP ID : '.$row2['trapId'];?></option>
                                                <?php
                                            }
                                        }
                                        else{
                                            ?>
                                            <option class="panel-primary text-center text-danger" style="width: 98%;">No Transmission yet...</option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="gamechat-container-message col-md-12 margin-off">
                            <h4 class="text-left margin-off">&nbsp;ANSWER</h4>
                                <div class="col-md-10 chat-box-container1 text-center margin-less">
                                    <input type="text" name="message_answer" id="message" class="message-box" maxlength="100" autocomplete="off">
                                </div>
                                <div class="col-md-2 margin-less text-center">
                                    <button class="btn btn-primary" id="sendMsg" name="send_answer_message">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 margin-less">
                <div class="col-md-12 navigator-container margin-off img-avatar">
                    <div class="col-md-12 gamechat-container-header margin-less">
                        <header><strong>NAVIGATORS</strong></header>
                    </div>
                    <div class="col-md-12 navigators margin-off">
                        <div class="col-md-4 margin-off">
                            <div class="col-md-12 margin-off navigator-panel">
                                <img src="phpgameassets/avatars/Wind-Nabigetor.gif" alt="Wind Nabigetor">
                            </div>
                        </div>
                        <div class="col-md-4 margin-off">
                            <div class="col-md-12 margin-off navigator-panel">
                                <img src="phpgameassets/avatars/Wind-Nabigetor.gif" alt="Earth Navigator">
                            </div>
                        </div>
                        <?php
                            include '../assets/config/config.php';
                            $check_number_navigators = mysqli_query($myconn, "SELECT COUNT(role) As Counter FROM active_game WHERE role='navigator' AND gameid='$id'");
                            if(mysqli_num_rows($check_number_navigators) > 0){
                                while($row = mysqli_fetch_array($check_number_navigators)){
                                    $counter_player_per_team_in_this_game_lobby = $row['Counter'];
                                }
                            }
                            if($counter_player_per_team_in_this_game_lobby == 3){
                                echo "<div class=\"col-md-4 margin-off\">
                            <div class=\"col-md-12 margin-off navigator-panel\">
                                <img src=\"phpgameassets/avatars/Wind-Nabigetor.gif\" alt=\"Earth Navigator\">
                            </div>
                        </div>";
                            }
                            else{
                                echo "";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-1 margin-off img-avatar">
                <div class="col-md-12 gamechat-container-header margin-less">
                    <header><strong>MOVE</strong></header>
                </div>
                <div class="col-md-12 movement-container">
                    <h1 class="text-center text-info">
                        <strong class="text-center">
                            <center>
                            <?php
                                if($_SESSION['MOVEMENT_NUMBER'] == 1 ){
                                    echo "<pre class='text-center dice-margin'><br>&bullet;<br><br></pre>";
                                }
                                elseif ($_SESSION['MOVEMENT_NUMBER'] == 2 ){
                                    echo "<pre class='text-center dice-margin'>&bullet;&nbsp;&nbsp; <br>&nbsp;&nbsp;&nbsp;<br>&nbsp;&nbsp;&bullet;</pre>";
                                }
                                elseif ($_SESSION['MOVEMENT_NUMBER'] == 3){
                                    echo "<pre class='text-center dice-margin'>&bullet;&nbsp;&nbsp; <br>&nbsp;&bullet;&nbsp;<br>&nbsp;&nbsp;&bullet;</pre>";
                                }
                                elseif ($_SESSION['MOVEMENT_NUMBER'] == 4){
                                    echo "<pre class='text-center dice-margin'>&nbsp;&bullet;&nbsp;&bullet; <br>&nbsp;&nbsp;&nbsp;<br>&bullet;&nbsp;&bullet;</pre>";
                                }
                                elseif ($_SESSION['MOVEMENT_NUMBER'] == 5){
                                    echo "<pre class='text-center dice-margin'>&nbsp;&bullet;&nbsp;&bullet; <br>&nbsp;&bullet;&nbsp;<br>&bullet;&nbsp;&bullet;</pre>";
                                }
                                elseif ($_SESSION['MOVEMENT_NUMBER'] == 6){
                                    echo "<pre class='text-center dice-margin'>&nbsp;&bullet;&nbsp;&bullet; <br>&bullet;&nbsp;&bullet;<br>&bullet;&nbsp;&bullet;</pre>";
                                }
                            ?>
                            </center>
                        </strong>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // var x = 0;
    // var y = 0;
    let element = document.getElementById("map");
    controller = panzoom(element, {maxZoom: 2, minZoom: .75});
    // document.getElementById('00').innerHTML = '<img src="phpgameassets/img/trainer.png" style="height:30px">';
    function resetmap() {
        controller.dispose();
        controller = panzoom(element, {maxZoom: 2, minZoom: .75});
    }
    // function move(s){
    //     document.getElementById(x+''+y).innerHTML = '';
    //     switch (s) {
    //         case "up":
    //             document.getElementById(--x+''+y).innerHTML = '<img src="phpgameassets/img/trainer.png" style="height:30px">';
    //             break;
    //         case "down":
    //             document.getElementById(++x+''+y).innerHTML = '<img src="phpgameassets/img/trainer.png" style="height:30px">';
    //             break;
    //         case "left":
    //             document.getElementById(x+''+--y).innerHTML = '<img src="phpgameassets/img/trainer.png" style="height:30px">';
    //             break;
    //         case "right":
    //             document.getElementById(x+''+ ++y).innerHTML = '<img src="phpgameassets/img/trainer.png" style="height:30px">';
    //             break;
    //     }
    // }
</script>
<script src="phpgameassets/js/1.8.2jquery.min.js" rel="script" type="text/javascript"></script>
<script src="phpgameassets/js/insert.js" type="text/javascript" rel="script"></script>
<script src="phpgameassets/js/retrieve.js"></script>
</body>
</html>
