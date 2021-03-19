$(document).ready(function() {
    var $pic = $('#picture'),
        context = $pic.get(0).getContext('2d');
    $('#instructionPicture').on('change', function() {
        $("#iPic").addClass("hidden");
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

    $("#submit").click(function(event) {
        event.preventDefault();

        var stepNumber = $("stepNumber").val();
        var description = $("description").val();
        var error = document.getElementById("err");

        if (stepNumber == "" && description == "") {
            error.innerText = "Please, fill all the feilds!";
            $("#err").removeClass("hide");
            return false;
        } else if (stepNumber == "") {
            error.innerText = "Please, fill step number feild!";
            $("#err").removeClass("hide");
            return false;
        } else if (description == "") {
            error.innerText = "Please, fill description feild!";
            $("#err").removeClass("hide");
            return false;
        } else if (stepNumber != "" && description != "") {
            var data = $("#sprainForm")[0];
            var formData = new FormData(data);
            var files = $('#instructionPicture')[0].files;
            formData.append('file', files[0]);
            $.ajax({
                url: 'updatesprain',
                type: 'post',
                data: formData,
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                success: function(response) {
                    document.getElementById('modal2').style.display = 'block';
                    setTimeout(function() {
                        document.getElementById('modal2').style.display = 'none';
                        $("#instructionrow").load('spraininstructionlist');
                    }, 1000);
                },
            });
        } else {
            $("#err").addClass("hide");
        }
    });
});


function confirm(id) {
    document.getElementById('modal3').style.display = 'block';
    var nav = document.getElementById("navbar");
    var breadcrumb = document.getElementById("breadcrum");
    nav.style.display = "none";
    breadcrumb.style.display = "none";

    $("#yes").click(function(event) {
        event.preventDefault();

        $.ajax({
            url: "deletesprain",
            method: "post",
            data: { id: id },
            success: function(data) {
                document.getElementById('modal3').style.display = 'none';
                document.getElementById('modal4').style.display = 'block';
                nav.style.display = "block";
                breadcrumb.style.display = "block";
                setTimeout(function() {
                    document.getElementById('modal4').style.display = 'none';
                    $("#instructionrow").load('spraininstructionlist');
                }, 1000);
            }
        });
    });
}

$(document).ready(function() {
    $("#instructionrow").load('spraininstructionlist');
});

function edit(id) {
    window.location = "editsprain?id=" + id;
}

function closeconfirm() {
    document.getElementById('modal3').style.display = 'none';
    var nav = document.getElementById("navbar");
    var breadcrumb = document.getElementById("breadcrum");
    nav.style.display = "block";
    breadcrumb.style.display = "block";
}

var modal3 = document.getElementById('modal3');

window.onclick = function(event) {
    if (event.target == modal3) {
        modal3.style.display = "none";
    }
}