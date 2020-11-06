$(document).ready(function() {
    $("#submit").click(function(event) {
        event.preventDefault();

        var userName = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var error = document.getElementById("err");
        if (userName == "" && password == "") {
            error.innerText = "Please, fill the username, password feilds!";
            $("#err").removeClass("hide");
        } else if (userName == "") {
            error.innerText = "Please enter the username!";
            $("#err").removeClass("hide");
        } else if (password == "") {
            error.innerText = "Please enter the password!";
            $("#err").removeClass("hide");
        } else if (userName != "" && password != "") {
            if (userName.includes("careu_119") || userName.includes("careu_1990") || userName.includes("careu_admin")) {
                var formData = $("#logIn").serialize();
                $.post("careu/verify",
                    formData,
                    function(data, status) {
                        if (data.trim() == "failed" && status.trim() == "success") {
                            error.innerText = "Invalid username or password. Try again!";
                            $("#err").removeClass("hide");
                        } else if (data.trim() == "success" && status.trim() == "success") {
                            if (userName.includes("admin")) {
                                window.location.href = "careuadmin/home";
                            }

                            if (userName.includes("119")) {
                                window.location.href = "police/home";
                            }

                            if (userName.includes("1990")) {
                                window.location.href = "suwasariya/home";
                            }
                        }
                    }
                );
            } else {
                error.innerText = "Invalid username!";
                $("#err").removeClass("hide");
            }
        }
    });
});