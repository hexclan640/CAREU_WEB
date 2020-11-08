$(document).ready(function() {
    $("#submit").click(function(event) {
        event.preventDefault();

        var firstname = document.getElementById("firstName").value;
        var lastname = document.getElementById("lastName").value;
        var password1 = document.getElementById("password1").value;
        var password2 = document.getElementById("password2").value;
        var error = document.getElementById("err");

        if (firstname == "" && lastname == "" && password1 == "" && password2 == "") {
            error.innerText = "Please, fill all the feilds!";
            $("#err").removeClass("hide");
        } else if (firstname == "") {
            error.innerText = "Please, give a first name!";
            $("#err").removeClass("hide");
        } else if (lastname == "") {
            error.innerText = "Please, give a last name!";
            $("#err").removeClass("hide");
        } else if (password1 == "" || password2 == "") {
            error.innerText = "Please, fill the password feilds!";
            $("#err").removeClass("hide");
        } else if (password1 != password2) {
            error.innerText = "Passwords do not match!";
            $("#err").removeClass("hide");
        } else if (firstname != "" && lastname != "" && password1 != "" && password2 != "") {
            var formData = $("#editProfile").serialize();
            $.post("updateprofile",
                formData,
                function(data, status) {
                    console.log(data);
                    if (data.includes("failed") && status.includes("success")) {
                        error.innerText = "Something went wrong. Try again!";
                        $("#err").removeClass("hide");
                    } else if (data.includes("success") && status.includes("success")) {
                        window.location.href = "home";
                    } else {
                        error.innerText = "Something went wrong. Try again!";
                        $("#err").removeClass("hide");
                    }
                }
            );
        } else {
            $("#err").addClass("hide");
        }
    });
});