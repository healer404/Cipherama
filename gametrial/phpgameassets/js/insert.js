$(document).ready(function(){
    $("#sub").click(function () {
        // var data = $("#myForm :input").serializeArray();
        $.post($("#myForm").attr("action"),$("#myForm :input").serializeArray(),function (info) {
            $("#result").html(info);
        });
        document.getElementById('message').value = "";

    });

    $("#myForm").submit(function () {
        return false;
    });
});