$(document).ready(function() {
    setInterval(function() {
        $("#badge1").load('userrequestscount');
        $("#badge2").load('userrequestscount')
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