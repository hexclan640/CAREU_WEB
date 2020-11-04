$(document).ready(function() {
    $("#submit").click(function(event) {
        event.preventDefault();

        var username = document.getElementById("userName").value;
        var firstname = document.getElementById("firstName").value;
        var lastname = document.getElementById("lastName").value;
        var gender = document.getElementById("gender").value;
        var password1 = document.getElementById("password1").value;
        var password2 = document.getElementById("password2").value;
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
            error.innerText = "Please, select a gender!";
            $("#err").removeClass("hide");
        } else if (password1 == "" || password2 == "") {
            error.innerText = "Please, fill the password feilds!";
            $("#err").removeClass("hide");
        } else if (password1 != password2) {
            error.innerText = "Passwords do not match!";
            $("#err").removeClass("hide");
        } else if (username != "" && firstname != "" && lastname != "" && password1 != "" && password2 != "") {
            var formData = $("#formOperator1990").serialize();
            $.post("newoperator1990",
                formData,
                function(data, status) {
                    console.log(data);
                    if (data == "failed" && status == "success") {
                        error.innerText = "Something went wrong. Try again!";
                        $("#err").removeClass("hide");
                    } else {
                        window.location.href = "home";
                    }
                }
            );
        } else {
            $("#err").addClass("hide");
        }
    });
});