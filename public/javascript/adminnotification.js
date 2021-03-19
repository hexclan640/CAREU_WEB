$(document).ready(function() {
    setInterval(function() {
        $("#badge1").load('userrequestscount');
        $("#badge2").load('userrequestscount')
    }, 2000);
});