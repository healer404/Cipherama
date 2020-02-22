
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>TRIAL</title>
</head>
<body>
<svg
    id="logo"
    xmlns="http://www.w3.org/2000/svg"
    xmlns:xlink="http://www.w3.org/1999/xlink"
    width="5.708in" height="0.944in">
    <text kerning="auto" font-family="Myriad Pro" stroke-width="2px" stroke="rgb(60, 165, 181)" fill-opacity="0" stroke-opacity="1" font-size="83.333px" x="4px" y="64px"><tspan font-size="83.333px" font-family="Arial" fill="none">C</tspan></text>
    <text kerning="auto" font-family="Myriad Pro" stroke-width="2px" stroke="rgb(60, 165, 181)" fill-opacity="0" stroke-opacity="1" font-size="83.333px" x="59px" y="64px"><tspan font-size="83.333px" font-family="Arial" fill="none">I</tspan></text>
    <text kerning="auto" font-family="Myriad Pro" stroke-width="2px" stroke="rgb(60, 165, 181)" fill-opacity="0" stroke-opacity="1" font-size="83.333px" x="79px" y="64px"><tspan font-size="83.333px" font-family="Arial" fill="none">P</tspan></text>
    <text kerning="auto" font-family="Myriad Pro" stroke-width="2px" stroke="rgb(60, 165, 181)" fill-opacity="0" stroke-opacity="1" font-size="83.333px" x="135px" y="64px"><tspan font-size="83.333px" font-family="Arial" fill="none">H</tspan></text>
    <text kerning="auto" font-family="Myriad Pro" stroke-width="2px" stroke="rgb(60, 165, 181)" fill-opacity="0" stroke-opacity="1" font-size="83.333px" x="190px" y="64px"><tspan font-size="83.333px" font-family="Arial" fill="none">E</tspan></text>
    <text kerning="auto" font-family="Myriad Pro" stroke-width="2px" stroke="rgb(60, 165, 181)" fill-opacity="0" stroke-opacity="1" font-size="83.333px" x="244px" y="64px"><tspan font-size="83.333px" font-family="Arial" fill="none">R</tspan></text>
    <text kerning="auto" font-family="Myriad Pro" stroke-width="2px" stroke="rgb(60, 165, 181)" fill-opacity="0" stroke-opacity="1" font-size="83.333px" x="305px" y="64px"><tspan font-size="83.333px" font-family="Arial" fill="none">A</tspan></text>
    <text kerning="auto" font-family="Myriad Pro" stroke-width="2px" stroke="rgb(60, 165, 181)" fill-opacity="0" stroke-opacity="1" font-size="83.333px" x="360px" y="64px"><tspan font-size="83.333px" font-family="Arial" fill="none">M</tspan></text>
    <text kerning="auto" font-family="Myriad Pro" stroke-width="2px" stroke="rgb(60, 165, 181)" fill-opacity="0" stroke-opacity="1" font-size="83.333px" x="429px" y="64px"><tspan font-size="83.333px" font-family="Arial" fill="none">A</tspan></text>

</svg>

<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    body{
        width: 100%;
        height: 100vh;
        background-color:rgb(32, 35, 48);
    }
    #logo{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    #logo text{
        animation: filler 0.5s ease forwards 3s;
    }

    #logo text tspan{
        border: 10px solid cyan;
        box-shadow: 10px 10px 10px #15cefb;
    }
    #logo text:nth-child(1){
        stroke-dasharray: 530px;
        stroke-dashoffset: 600px;
        animation: line-anim 5s ease forwards;
    }
    #logo text:nth-child(2){
        stroke-dasharray: 530px;
        stroke-dashoffset: 590px;
        animation: line-anim 8s ease forwards;
    }
    #logo text:nth-child(3){
        stroke-dasharray: 540px;
        stroke-dashoffset: 580px;
        animation: line-anim 5s ease forwards;
    }
    #logo text:nth-child(4){
        stroke-dasharray: 545px;
        stroke-dashoffset: 575px;
        animation: line-anim 8s ease forwards;
    }
    #logo text:nth-child(5){
        stroke-dasharray: 550px;
        stroke-dashoffset: 570px;
        animation: line-anim 5s ease forwards;
    }
    #logo text:nth-child(6){
        stroke-dasharray: 570px;
        stroke-dashoffset: 570px;
        animation: line-anim 5s ease forwards;
    }
    #logo text:nth-child(7){
        stroke-dasharray: 550px;
        stroke-dashoffset: 570px;
        animation: line-anim 5s ease forwards;
    }
    #logo text:nth-child(8){
        stroke-dasharray: 550px;
        stroke-dashoffset: 570px;
        animation: line-anim 5s ease forwards;
    }
    #logo text:nth-child(9){
        stroke-dasharray: 550px;
        stroke-dashoffset: 570px;
        animation: line-anim 5s ease forwards;
    }
    @keyframes line-anim {
        from{
            fill-opacity: 0;
            fill: none;
        }
        to{
            stroke-dashoffset: 0;
            fill: white;
            fill-opacity: 100%;
        }
    }
    @keyframes filler {
        to{
            fill: white;
            fill-opacity: 100%;
        }
    }
</style>
<script>
    const logo = document.querySelectorAll("#logo text tspan");
    for (let i = 0; i < logo.length; i++){
        console.log(`letter ${i} is ${logo[i].getTotalLength();}`)
    }
</script>
<div class=""
</body>
</html>