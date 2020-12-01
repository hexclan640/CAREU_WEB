function check() {
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
        return false;
    } else if (username == "") {
        error.innerText = "Please, give a username!";
        $("#err").removeClass("hide");
        return false;
    } else if (firstname == "") {
        error.innerText = "Please, give a first name!";
        $("#err").removeClass("hide");
        return false;
    } else if (lastname == "") {
        error.innerText = "Please, give a last name!";
        $("#err").removeClass("hide");
        return false;
    } else if (gender == "") {
        error.innerText = "Please, give a gender!";
        $("#err").removeClass("hide");
        return false;
    } else if (password1 == "" || password2 == "") {
        error.innerText = "Please, fill the password feilds!";
        $("#err").removeClass("hide");
        return false;
    } else if (password1 != password2) {
        error.innerText = "Passwords do not match!";
        $("#err").removeClass("hide");
        return false;
    } else if (username != "" && firstname != "" && lastname != "" && password1 != "" && password2 != "") {
        if (username.includes("careu_119_")) {
            return true;
        } else {
            error.innerText = "Invalid type of username!";
            $("#err").removeClass("hide");
            return false;
        }
    } else {
        $("#err").addClass("hide");
    }
}