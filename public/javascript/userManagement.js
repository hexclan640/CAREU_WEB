$(document).ready(function() {
    setInterval(function() {
        $("#col1").load('userrequests')
    }, 2000);

    setInterval(function() {
        $("#col2").load('userbrief')
    }, 2000);
});