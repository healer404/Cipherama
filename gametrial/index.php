<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Cipherama">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Cipherama | <?php echo date('Y')?></title>
<link href="phpgameassets/3.4.1.bootstrap.min.css" rel="stylesheet" type="text/css">
<script src="phpgameassets/js/panzoom.min.js"></script>
</head>
<body>
<div class="col-md-12">
    <div class="col-md-4">
        <div class="icon">
            <div class="image-icon">
                <img src="phpgameassets/img/general-icon.png" alt="">
                <h3>General</h3>
                <form action="game-field-commander.php" class="roles-form">
                    <input type="submit" class="btn btn-primary" value="Choose">
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="icon">
            <div class="image-icon">
                <img src="phpgameassets/img/navigator-icon.png" alt="">
                <h3>Navigator</h3>
                <form action="navigator.php" class="roles-form">
                    <input type="submit" class="btn btn-primary" value="Choose">
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="icon">
            <div class="image-icon">
                <img src="phpgameassets/img/decoder-icon.png" alt="">
                <h3>Decoder</h3>
                <form action="decoder.php" class="roles-form">
                    <input type="submit" class="btn btn-primary" value="Choose">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<style>
    img{
        max-height: 90%;
        max-width: 90%;
        border-radius: 30px;
        margin-top: 30px;
    }
    .roles-form{
        position: absolute;
        bottom: 75px;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .image-icon{
        text-align: center;
    }
    .icon{
        margin: 50px 30px;
        height: 500px;
        border-radius: 15px 50px;
        background: #28a745;
    }
</style>
</html>