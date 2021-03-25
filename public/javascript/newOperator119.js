$(document).ready(function() {
    $("#submit").click(function(event) {
        event.preventDefault();
        document.getElementById('loader-wrapper2').style.display = "block";

        var username = $("#userName").val();
        var firstname = $("#firstName").val();
        var lastname = $("#lastName").val();
        var gender = $("#gender").val();
        var password1 = $("#password1").val();
        var password2 = $("#password2").val();
        var error = document.getElementById("err");

        if (username == "" && firstname == "" && lastname == "" && password1 == "" && password2 == "") {
            error.innerText = "Please, fill all the feilds!";
            $("#err").removeClass("hide");
        } else if (username == "") {
            error.innerText = "Please, give a username!";
            $("#err").removeClass("hide");
        } else if (firstname == "") {
            error.innerText = "Please, give a first name!";
            $("#err").removeClass("hide");
        } else if (lastname == "") {
            error.innerText = "Please, give a last name!";
            $("#err").removeClass("hide");
        } else if (gender == "") {
            error.innerText = "Please, give a gender!";
            $("#err").removeClass("hide");
        } else if (password1 == "" || password2 == "") {
            error.innerText = "Please, fill the password feilds!";
            $("#err").removeClass("hide");
        } else if (password1 != password2) {
            error.innerText = "Passwords do not match!";
            $("#err").removeClass("hide");
        } else if (username != "" && firstname != "" && lastname != "" && password1 != "" && password2 != "") {
            if (username.includes("careu_119_")) {
                var formData = $("#formOperator119").serialize();
                $.post("usernamechecker119",
                    formData,
                    function(data, status) {
                        console.log(data);
                        if (data.includes("false") && status.includes("success")) {
                            error.innerText = "Username already exists.";
                            $("#err").removeClass("hide");
                        } else if (data.includes("true") && status.includes("success")) {
                            var data = $("#formOperator119")[0];
                            var formData = new FormData(data);
                            $.ajax({
                                url: "newoperator119",
                                method: "post",
                                data: formData,
                                enctype: 'multipart/form-data',
                                contentType: false,
                                processData: false,
                                success: function(data) {
                                    error.innerText = "";
                                    $("#err").addClass("hide");
                                    $("#formOperator119").trigger("reset");
                                    setTimeout(function() {
                                        document.getElementById('loader-wrapper2').style.display = 'none';
                                        document.getElementById('modal1').style.display = 'block';
                                        setTimeout(function() { document.getElementById('modal1').style.display = 'none'; }, 1000);
                                    }, 1000);
                                }
                            });
                        }
                    });
            } else {
                error.innerText = "Invalid type of username!";
                $("#err").removeClass("hide");
                return false;
            }
        } else {
            $("#err").addClass("hide");
        }
    });

    $('#userName').keyup(function() {
        var search = $(this).val();
        var error = document.getElementById("err");
        if (search != 'careu_119_' && search.length > 11) {
            $.ajax({
                url: "operatorchecker119",
                method: "post",
                data: { query: search },
                success: function(data) {
                    // $('#result').html(data);
                    if (data.includes("failed")) {
                        document.getElementById("userName").style.color = "red";
                        error.innerText = "Username already taken!";
                        $("#err").removeClass("hide");
                    } else {
                        document.getElementById("userName").style.color = "black";
                        $("#err").addClass("hide");
                    }
                }
            });
        } else {
            $("#err").addClass("hide");
        }
    });
});