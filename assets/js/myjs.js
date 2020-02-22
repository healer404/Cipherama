$(document).ready(function () {
    done();

});
function done() {
    setTimeout(function () {updates();
    done();
    }, 200)
}
function updates() {

    $.get("setroles.php", function(data){
        if(data != 'Di Pa Kumpleto Puta'){
            window.location.replace(data);
        }
    });
    $.getJSON("messages.php", function (data) {
        $("live-chat").empty();

        $.each(data, function (i) {
            $("live-chat").append(data[i]['username']+":<pre class='pre-container'>"+data[i]['message']+"</pre>");
        });
    });
    $.getJSON("activeplayers.php", function (data) {
        $("active-players").empty();

        $.each(data, function (i) {
            $("active-players").append("<pre class='pre-container'>"+(i+1)+". "+data[i]+"</pre>");
        });
    });
    $.getJSON("activelobby.php", function (data) {
        $("active-lobby").empty();

        $.each(data, function (i) {
            let param = data[i]['gameid'];
            $("active-lobby").append("<a href='../lobby/join-lobby.php?gameid="+data[i]['gameid']+"&creator="+data[i]['creator']+"'><pre class='no-overflow pre-container'>ID: "+data[i]['gameid']+" [<font color=\"yellow\">"+data[i]['players']+"</font>/"+data[i]['maxplayers']+"]</pre></a>");
        });
    });
    $.getJSON("team-air-players.php", function (data) {
        $("team-air").empty();

        $.each(data, function (i) {
            $("team-air").append("<p class='text-center margin-off'>"+data[i]+"</p>");
        });
    });
    $.getJSON("team-fire-players.php", function (data) {
        $("team-fire").empty();

        $.each(data, function (i) {
            $("team-fire").append("<p class='text-center margin-off'>"+data[i]+"</p>");
        });
    });
    $.getJSON("team-earth-players.php", function (data) {
        $("team-earth").empty();

        $.each(data, function (i) {
            $("team-earth").append("<p class='text-center margin-off'>"+data[i]+"</p>");
        });
    });
    $.getJSON("team-water-players.php", function (data) {
        $("team-water").empty();

        $.each(data, function (i) {
            $("team-water").append("<p class='text-center margin-off'>"+data[i]+"</p>");
        });
    });
    $.getJSON("show-players-waiting.php", function (data) {
        $("players-waiting").empty();

        $.each(data, function (i) {
            $("players-waiting").append("<p class='text-center margin-off'>"+data[i]+"</p>");
        });
    });

    $.getJSON("transmissions.php", function (data) {
        $("transmissions").empty();

        $.each(data, function (i) {
            $("transmissions").append(data[i]['username']+":<pre class='pre-container'>"+data[i]['message']+"</pre>");
        });
    });
}
