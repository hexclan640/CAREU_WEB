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
            var formData = $("#changePassword").serialize();
            $.post("passwordchange",
                formData,
                function(data, status) {
                    if (data.includes("failed") && status.includes("success")) {
                        error.innerText = "Invalid username or password. Try again!";
                        $("#err").removeClass("hide");
                    } else if (data.includes("success") && status.includes("success")) {
                        window.location = "profile";
                    }
                });
        }
    });
});

function trigger() {
    var input = document.getElementById("password1");
    var error = document.getElementById("err1");
    console.log(input.value);
    let regExpWeak = /[a-z]/;
    let regExpMedium = /\d+/;
    let regExpStrong = /.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/;
    if (input.value != "") {

        if (input.value.length <= 3 && (input.value.match(regExpWeak) || input.value.match(regExpMedium) || input.value.match(regExpStrong))) no = 1;
        if (input.value.length >= 6 && ((input.value.match(regExpWeak) && input.value.match(regExpMedium)) || (input.value.match(regExpMedium) && input.value.match(regExpStrong)) || (input.value.match(regExpWeak) && input.value.match(regExpStrong)))) no = 2;
        if (input.value.length >= 6 && input.value.match(regExpWeak) && input.value.match(regExpMedium) && input.value.match(regExpStrong)) no = 3;
        if (no == 1) {
            input.style.color = "#ff4757";
        }
        if (no == 2) {
            input.style.color = "orange";
        }
        if (no == 3) {
            input.style.color = "#23ad5c";
        }
    } else {
        input.style.color = "black";
    }
}