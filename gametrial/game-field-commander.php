<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Cipherama">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--    <meta http-equiv="refresh" content="910">-->
    <title>Cipherama | <?php echo date('Y')?></title>
    <link href="phpgameassets/3.4.1.bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="phpgameassets/js/panzoom.min.js"></script>
</head>
<body>
<div class="col-md-12">
    <div class="custom-container">
        <div class="col-md-12">
            <div class="sub-custom-container">
                <div class="col-md-9">
                    <div class="world-map-visual">
                        <table id="map" class="table map">
                            <?php for($i = 0; $i < 10; $i++){?>
                                <tr><?php
                                    for($j = 0; $j < 10; $j++){?>
                                        <td id="<?php echo $i.$j?>"></td>
                                    <?php } ?>
                                </tr>
                            <?php }?>
                        </table>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="gamechat-container col-md-12">
                        <div class="gamechat-container-header col-md-12">
                            <header><strong>Team Chat</strong></header>
                        </div>
                        <div class="gamechat-container-body col-md-12">
                        </div>
                        <div class="gamechat-container-message col-md-12">
                            <form id="myForm" action="sendmessage.php" method="post">
                                <div class="col-md-10 chat-box-container">
                                    <input type="text" name="message" id="message" class="message-box" maxlength="100" autocomplete="off">
                                </div>
                                <div class="col-md-2 chat-send-container">
                                    <button class="btn btn-primary" id="sub">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="player-panel-container col-md-12">
                        <div class="col-md-2">
                            <div class="general-avatar ">
                                <img src="phpgameassets/img/general.png">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="general-mini-map">
                                    <table>
                                        <?php
                                        for ($i = 0; $i < 10; $i++) {
                                            ?>
                                            <tbody>
                                            <tr>
                                                <?php
                                                for ($j = 0; $j < 10; $j++) {
                                                    ?>
                                                    <td>
                                                    <form action="trysave.php" method="post">
                                                        <input type="hidden" name="move" value="<?php echo $i.$j; ?>">
                                                        <input type="submit" id="<?php echo $i . $j ?>" value="<?php echo $i.$j; ?>" class="cell-button">
                                                    </form>
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
                        <div class="col-md-4" style="margin: 0; padding: 0;">
                            <div class="general-input-zone col-md-12">
                                <div class="col-md-12" style="margin: 0; padding: 0;" id="decode">
                                    <p class="text-center" style="padding: 0; margin: 0;"><strong>DECODE</strong></p>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-1">
                                        &xlArr;
                                    </div>
                                    <div class="col-md-10">
                                        <pre><span>dfdfsfhdjsfhdsjfhksjfhskdjfksdjfksdjflsdfjsdfjsldkfjskdjfkl</span></pre>
                                    </div>
                                    <div class="col-md-1">
                                        &xrArr;
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <input type="text">
                                </div>
                                <div class="col-md-12 text-center">
                                    <input type="submit">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="general-navigators">
                                <div class="col-md-12">
                                    <div class="col-md-6 navigators-container">
                                        <img src="phpgameassets/img/navigators.png">
                                    </div>
                                    <div class="col-md-6">
                                        dfjh
                                    </div>
                                    <div class="col-md-6 navigators-container">
                                        <img src="phpgameassets/img/navigators.png">
                                    </div>
                                    <div class="col-md-6">
                                        dfjh
                                    </div>
                                    <div class="col-md-6 navigators-container">
                                        <img src="phpgameassets/img/navigators.png">
                                    </div>
                                    <div class="col-md-6">
                                        dfjh
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="general-dice">
                                Dice
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var x = 0;
    var y = 0;
    let element = document.getElementById("map");
    controller = panzoom(element, {maxZoom: 2, minZoom: .75});
    document.getElementById('00').innerHTML = '<img src="phpgameassets/img/trainer.png" style="height:30px">';
    function resetmap() {
        controller.dispose();
        controller = panzoom(element, {maxZoom: 2, minZoom: .75});
    }
    function move(s){
        document.getElementById(x+''+y).innerHTML = '';
        switch (s) {
            case "up":
                document.getElementById(--x+''+y).innerHTML = '<img src="phpgameassets/img/trainer.png" style="height:30px">';
                break;
            case "down":
                document.getElementById(++x+''+y).innerHTML = '<img src="phpgameassets/img/trainer.png" style="height:30px">';
                break;
            case "left":
                document.getElementById(x+''+--y).innerHTML = '<img src="phpgameassets/img/trainer.png" style="height:30px">';
                break;
            case "right":
                document.getElementById(x+''+ ++y).innerHTML = '<img src="phpgameassets/img/trainer.png" style="height:30px">';
                break;
        }
    }
</script>
<script src="phpgameassets/js/1.8.2jquery.min.js"></script>
<script src="phpgameassets/js/insert.js"></script>
<script src="phpgameassets/js/retrieve.js"></script>
</body>
</html>
