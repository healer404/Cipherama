<html>
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
<!--            <input value="Reset" type="button" class="btn btn-success" onclick="resetmap()">-->
<!--            <input type="button" value="UP" class="btn btn-info" onclick="move('up')">-->
<!--            <input type="button" value="DOWN" class="btn btn-info" onclick="move('down')">-->
<!--            <input type="button" value="LEFT" class="btn btn-info" onclick="move('left')">-->
<!--            <input type="button" value="RIGHT" class="btn btn-info" onclick="move('right')">-->
        </div>
        <div class="col-md-12">
            <div class="col-md-1" style="border: #0f0f0f solid 1px; height: 100px; margin-top: 2%"></div>
            <div class="col-md-3" style="height: auto; margin-top: 2%">
                    <?php for($i = 0; $i < 10; $i++){
                            for($j = 0; $j < 10; $j++){?>
                                <sub>
                                    <input type="button" id="<?php echo $i.$j?>" style="height: 10px; margin: 0">
                                </sub>
                            <?php } ?>
                        <br>
                    <?php }?>
            </div>
        </div>
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
    table tr td{
        border: #0f0f0f solid 1px;
    }
    table #map .map{
        background-image: url("phpgameassets/img/8-bit-google-maps-2.jpg");
        background-repeat: no-repeat;
    }
    div.map-area{
        overflow: hidden;
    }
    td{
        width: 98px;
        height: 47px;
        text-align: center;
    }
</style>