var url_base = "http://localhost/comp426_nebula";

$(document).ready(function () {
    $('#hacker').click(function (e) {
        e.preventDefault();
        sendData("hack");
    });

       $('#writing').click(function (e) {
        e.preventDefault();
        sendData("write");
    });

          $('#music').click(function (e) {
        e.preventDefault();
        sendData("music");
    });

             $('#art').click(function (e) {
        e.preventDefault();
        sendData("art");
    });

                $('#maker').click(function (e) {
        e.preventDefault();
        sendData("maker");
    });

                     $('#coworking').click(function (e) {
        e.preventDefault();
        sendData("cowork");
    });
});


var sendData = function (type) {
    var city = document.getElementById("city").value;
    var state = document.getElementById("state").value;
    var packed = type + "/" + city + "/" + state;
    window.location = "search_type.html?" + packed;
};  
