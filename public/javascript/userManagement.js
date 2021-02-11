$(document).ready(function() {
    setInterval(function() {
        $("#col1").load('userrequests')
    }, 2000);

    setInterval(function() {
        $("#col2").load('userbrief')
    }, 2000);

    function load_data1(query) {
        $.ajax({
            url: "searchunverified",
            method: "post",
            data: { query: query },
            success: function(data) {
                $('#result1').html(data);
            }
        });
    }

    $('#search1').keyup(function() {
        var search1 = $(this).val();
        if (search1 != '') {
            load_data1(search1);
        } else {
            $("#result1").empty();
        }
    });

    function load_data2(query) {
        $.ajax({
            url: "searchverified",
            method: "post",
            data: { query: query },
            success: function(data) {
                $('#result2').html(data);
            }
        });
    }

    $('#search2').keyup(function() {
        var search1 = $(this).val();
        if (search1 != '') {
            load_data2(search1);
        } else {
            $("#result2").empty();
        }
    });
});