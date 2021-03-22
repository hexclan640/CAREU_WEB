$(document).ready(function() {
    $("#submit").click(function(event) {
        event.preventDefault();

        var userName = document.getElementById("username").value;
        var error = document.getElementById("err");
        if (userName == "") {
            error.innerText = "Please enter the username!";
            $("#err").removeClass("hide");
        } else if (userName != "") {
            if (userName.includes("careu_119") || userName.includes("careu_1990") || userName.includes("careu_admin")) {
                var formData = $("#logIn").serialize();
                $.post("verifyusername",
                    formData,
                    function(data, status) {
                        if (data.includes("failed") && status.includes("success")) {
                            error.innerText = "Invalid username. Try again!";
                            $("#err").removeClass("hide");
                        } else if (data.includes("success") && status.includes("success")) {
                            // if (userName.includes("admin")) {
                            //     window.location = "careuadmin/home";
                            // }

                            // if (userName.includes("119")) {
                            //     window.location = "police/home";
                            // }

                            // if (userName.includes("1990")) {
                            //     window.location = "suwasariya/home";
                            // }
                            error.innerText = "xxxxxxxxxxxxxxx";
                            $("#err").removeClass("hide");

                            // setTimeout(function() {
                            //     $(".loader-wrapper").fadeOut("fast");
                            // }, 2000);

                            // $.ajax({
                            //     url: "getEmail",
                            //     method: "post",
                            //     data: { username: userName },
                            //     success: function(data) {}
                            // });

                            window.location = "getemail?username=" + userName;
                        }
                    });
            } else {
                error.innerText = "Invalid username!";
                $("#err").removeClass("hide");
            }
        }
    });
});