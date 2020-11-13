$(document).ready(function() {
    setInterval(function() {
        $("#requests").load('getrecent')
    }, 2000);
});