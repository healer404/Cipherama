<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <link href="phpgameassets/3.4.1.bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="phpgameassets/js/panzoom.min.js"></script>
</head>
<body>
<div class="col-md-12">
    <div class="col-md-8 map-area">
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
    <div class="col-md-4" style="border: #0f0f0f solid 1px; height: 470px">
                    <input value="Reset" type="button" class="btn btn-success" onclick="resetmap()">
                    <input type="button" value="UP" class="btn btn-info" onclick="move('up')">
                    <input type="button" value="DOWN" class="btn btn-info" onclick="move('down')">
                    <input type="button" value="LEFT" class="btn btn-info" onclick="move('left')">
                    <input type="button" value="RIGHT" class="btn btn-info" onclick="move('right')">
    </div>
    <div class="col-md-12" style="padding-top: -20px;">
        <div class="footbar" style="padding-top: 0;">
            <div class="col-md-2" style="border: #0f0f0f solid 1px; height: 160px; margin: 5px;"></div>
            <div class="col-md-3" style="height: auto; margin-top: -10px; padding-top: -200px;">
                <?php for($i = 0; $i < 10; $i++){
                    for($j = 0; $j < 10; $j++){?>
<!--                        <input type="button" id="--><?php //echo $i.$j?><!--" class="mini-table">-->
                        <tr class="mini-table">
                            <td><a href="#" id="<?php echo $i.$j?>" class="btn-primary mini-table-cell"></a></td>
                        </tr>

                    <?php } ?>
                    <sub>
                        <sub>
                            <sub>
                                <sub>
                                    <sub>
                                        <sub>
                                            <sub>
                                                <sub>
                                                    <sub>
                                                        <sub>
                                                            <sub>
                                                                <sub>
                                                                    <sub>
                                                                        <sub>
                                                                            <sub>
                                                                                <sub>
                                                                                    <sub>
                                                                                        <sub>
                                                                                            <sub>
                                                                                                <sub>
                                                                                                    <sub>
                                                                                                        <sub>
                                                                                                            <sub>
                                                                                                                <sub>
                                                                                                                    <sub>
                                                                                                                        <div style="margin-bottom: 0.00000000002vh;"></div>
                                                                                                                    </sub>
                                                                                                                </sub>
                                                                                                            </sub>
                                                                                                        </sub>
                                                                                                    </sub>
                                                                                                </sub>
                                                                                            </sub>
                                                                                        </sub>
                                                                                    </sub>
                                                                                </sub>
                                                                            </sub>
                                                                        </sub>
                                                                    </sub>
                                                                </sub>
                                                            </sub>
                                                        </sub>
                                                    </sub>
                                                </sub>
                                            </sub>
                                        </sub>
                                    </sub>
                                </sub>
                            </sub>
                        </sub>
                    </sub>

                <?php }?>
            </div>
        </div>
    </div>
</div>


<div class="col-md-12">
    <table>
    <?php
    for ($h = 1;$h <= 10; $h++) {
        ?>
        <td style="font-size: 5px;"><?php echo $h; ?></td>
        <?php
    }
        for ($i = 1; $i <= 10; $i++) {
            ?>

            <tbody>
            <tr>
                <?php
                for ($j = 1; $j <= 10; $j++) {
                    ?>
                    <td><input type="button" id="<?php echo $i . $j ?>"></td>
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

</body>
</html>
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
<style>
    body{
        /*overflow: hidden;*/
        margin: 0;
        padding: 0;
    }
    table tr td{
        border: #0f0f0f solid 1px;
    }
    table.map{
        background-image: url("phpgameassets/img/8-bit-google-maps-2.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        margin: 0;
        padding: 0;
    }
    div.map-area{
        overflow: hidden;
    }
    td{
        width: 98px;
        height: 47px;
        text-align: center;
        margin: 0;
        padding: 0;
    }
    .footbar{
        border: hotpink 1px solid;
        width: 100%;
        height: 170px;
        margin: 0;
        padding: 0;
    }
    .mini-table{

        margin: 0;

        padding: 0;
        width: 10px;
        display: inline-grid;
    }
    .mini-table-cell{
        height:10px;
        margin-top: -5px;

        padding: 0;
        width: 10px;
        display: inline-grid;
    }
    table tbody tr td{
        font-size: 1px;
        height: 10px; width: 10px;
    }
</style>