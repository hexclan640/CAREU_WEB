$(document).ready(function() {
    $("#submit").click(function(event) {
        event.preventDefault();

        var userName = document.getElementById("username").value;
        var currentPassword = document.getElementById("currentpassword").value;
        var password1 = document.getElementById("password1").value;
        var password2 = document.getElementById("password2").value;
        var error = document.getElementById("err");
        if (userName == "" && currentPassword == "" && password1 == "" && password2 == "") {
            error.innerText = "Please, fill the all feilds!";
            $("#err").removeClass("hide");
        } else if (userName == "") {
            error.innerText = "Please enter the username!";
            $("#err").removeClass("hide");
        } else if (currentPassword == "") {
            error.innerText = "Please enter the current password!";
            $("#err").removeClass("hide");
        } else if (password1 == "" && password2 == "") {
            error.innerText = "Please enter the password!";
            $("#err").removeClass("hide");
        } else if (password1 != password2) {
            error.innerText = "Passwords doesn't match!";
            $("#err").removeClass("hide");
        } else if (userName != "" && currentPassword != "" && password1 != "" && password2 != "") {
            $("#err").addClass("hide");
            var formData = $("#changePassword").serialize();
            $.post("passwordchange",
                formData,
                function(data, status) {
                    if (data.includes("failed") && status.includes("success")) {
                        document.getElementById('loader-wrapper2').style.display = "none";
                        error.innerText = "Invalid username or password. Try again!";
                        $("#err").removeClass("hide");
                    } else if (data.includes("success") && status.includes("success")) {
                        document.getElementById('loader-wrapper2').style.display = "block";
                        setTimeout(function() {
                            document.getElementById('loader-wrapper2').style.display = 'none';
                            document.getElementById('modal1').style.display = 'block';
                            setTimeout(function() {
                                document.getElementById('modal1').style.display = 'none';
                                window.location = "profile";
                            }, 1000);
                        }, 1000);
                    }
                });
        }
    });
});