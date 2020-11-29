$(document).ready(function() {
    var $pic = $('#picture2'),
        context = $pic.get(0).getContext('2d');
    $('#propic').on('change', function() {
        $("#pPic").addClass("hidden");
        $("#picture1").addClass("hidden");
        $("#picture2").removeClass("hidden");
        if (this.files && this.files[0]) {
            if (this.files[0].type.match(/^image\//)) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = new Image();
                    img.onload = function() {
                        context.canvas.width = img.width;
                        context.canvas.height = img.height;
                        context.drawImage(img, 0, 0);
                    };
                    img.src = e.target.result;
                };
                reader.readAsDataURL(this.files[0]);
            } else {
                alert('Invalid file type');
            }
        } else {
            alert('Please select a file.');
        }
    });
});

function check() {
    var firstname = document.getElementById("firstName").value;
    var lastname = document.getElementById("lastName").value;
    var error = document.getElementById("err");

    if (firstname == "" && lastname == "") {
        error.innerText = "Please, fill all the feilds!";
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
    } else if (firstname != "" && lastname != "") {
        return true;
    } else {
        $("#err").addClass("hide");
    }
}