$(document).ready(function () {
    done();
});
function done() {
    setTimeout(function () {updates();
    done();
    }, 200)
}
function updates() {
    $.getJSON("getmessages.php", function (data) {
        $(".gamechat-container-body").empty();
        $.each(data, function (i) {
            $(".gamechat-container-body").append(data[i]['username']+' ('+data[i]['role']+')'+":<pre class='message-text'>"+data[i]['message']+"</pre>");
        });
    });
}
