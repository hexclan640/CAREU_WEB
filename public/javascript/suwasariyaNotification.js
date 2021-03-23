$(document).ready(function() {
    setInterval(function() {
        $("#badge1").load('requestscount');
        $("#badge2").load('requestscount');
    }, 2000);
});

function logout() {
    $.ajax({
        url: "logout",
        method: "post",
        success: function(data) {
            window.location = "../careu";
        }
    });
}