$(document).ready(function() {
    setInterval(function() {
        $("#badge1").load('requestscount');
        $("#badge2").load('requestscount');
    }, 2000);
});