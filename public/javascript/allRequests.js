$(document).ready(function() {
    setInterval(function() {
        $("#requestcol").load('getall')
    }, 2000);

    function load_data(query) {
        $.ajax({
            url: "searchrequests",
            method: "post",
            data: { query: query },
            success: function(data) {
                $("#result").empty();
                $('#result').html(data);
                $("#requestcol").hide();
            }
        });
    }

    $('#search').keyup(function() {
        var search = $(this).val();
        if (search != '') {
            load_data(search);
        } else {
            $("#result").empty();
            var search1 = $("#option").val();
            if (search1 == "All") {
                $("#result").empty();
                $("#requestcol").show();
            } else if (search1 == "NotViewed") {
                load_data_notviewed();
            } else if (search1 == "Accepted") {
                load_data_accepted();
            } else if (search1 == "Rejected") {
                load_data_rejected();
            }
            $("#requestcol").show();
        }
    });

    function load_data_notviewed() {
        $.ajax({
            url: "notviewed",
            method: "post",
            data: {},
            success: function(data) {
                $("#result").empty();
                $('#result').html(data);
                $("#requestcol").hide();
            }
        });
    }

    function load_data_accepted() {
        $.ajax({
            url: "accepted",
            method: "post",
            data: {},
            success: function(data) {
                $("#result").empty();
                $('#result').html(data);
                $("#requestcol").hide();
            }
        });
    }

    function load_data_rejected() {
        $.ajax({
            url: "rejected",
            method: "post",
            data: {},
            success: function(data) {
                $("#result").empty();
                $('#result').html(data);
                $("#requestcol").hide();
            }
        });
    }

    $('#option').change(function() {
        var search = $(this).val();
        if (search == "All") {
            $("#result").empty();
            $("#requestcol").show();
        } else if (search == "NotViewed") {
            load_data_notviewed();
        } else if (search == "Accepted") {
            load_data_accepted();
        } else if (search == "Rejected") {
            load_data_rejected();
        }
    });
});