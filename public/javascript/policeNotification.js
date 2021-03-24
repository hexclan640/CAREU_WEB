$(document).ready(function() {
    setInterval(function() {
        $.ajax({
            url: "requestscount",
            method: "post",
            success: function(data) {
                if (sessionStorage.getItem("count") < data) {
                    sessionStorage.setItem("count", data);
                    document.getElementById("notification").style.display = "block";
                    document.getElementById("badge1").innerText = data;
                    document.getElementById("badge2").innerText = data;
                    var audio = new Audio("../audio/bell.mp3");
                    audio.play();
                } else {
                    sessionStorage.setItem("count", data);
                    document.getElementById("badge1").innerText = data;
                }
            }
        });
    }, 2000);
});

function closenotification() {
    document.getElementById("notification").style.display = "none";
}

function logout() {
    $.ajax({
        url: "logout",
        method: "post",
        success: function(data) {
            sessionStorage.clear();
            window.location = "../careu";
        }
    });
}