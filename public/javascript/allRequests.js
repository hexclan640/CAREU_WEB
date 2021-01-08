$(document).ready(function() {
    setInterval(function() {
        $("#requests").load('getall')
    }, 2000);
});