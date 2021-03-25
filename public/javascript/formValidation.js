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
                $("#err").addClass("hide");
                document.getElementById('loader-wrapper2').style.display = "block";
                var formData = $("#logIn").serialize();
                $.post("careu/verify",
                    formData,
                    function(data, status) {
                        if (data.includes("failed") && status.includes("success")) {
                            setTimeout(function() {
                                document.getElementById('loader-wrapper2').style.display = "none";
                                error.innerText = "Invalid username or password. Try again!";
                                $("#err").removeClass("hide");
                            }, 1000);
                        } else if (data.includes("success") && status.includes("success")) {
                            sessionStorage.setItem("count", 0);
                            if (userName.includes("admin")) {
                                window.location = "careuadmin/home";
                            }

                            if (userName.includes("119")) {
                                window.location = "police/home";
                            }

                            if (userName.includes("1990")) {
                                window.location = "suwasariya/home";
                            }
                        }
                    });
            } else {
                error.innerText = "Invalid username!";
                $("#err").removeClass("hide");
            }
        }
    });
});