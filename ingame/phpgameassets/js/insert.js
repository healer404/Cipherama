$(document).ready(function(){
    $("#sendMsg").click(function () {
        // var data = $("#myForm :input").serializeArray();
        $.post($("#sendMessagess").attr("action"),$("#sendMessagess :input").serializeArray(),function (info) {
            $("#result").html(info);
        });
        document.getElementById('message').value = "";
    });

    $("#sendMessagess").submit(function () {
        return false;
    });
});

$(document).ready(function(){
    $("#sendTeamBrief").click(function () {
        // var data = $("#myForm :input").serializeArray();
        $.post($("#myTransmissionss").attr("action"),$("#myTransmissionss :input").serializeArray(),function (info) {
            $("#result").html(info);
        });
        document.getElementById('message').value = "";
    });

    $("#myTransmissionss").submit(function () {
        return false;
    });
});