$(document).ready(function() {
    var $pic = $('#picture2'),
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
        document.getElementById('loader-wrapper2').style.display = "block";

        var stepNumber = document.getElementById("stepNumber").value;
        var description = document.getElementById("description").value;
        var error = document.getElementById("err");

        if (stepNumber == "" && description == "") {
            error.innerText = "Please, fill all the feilds!";
            $("#err").removeClass("hide");
        } else if (stepNumber == "") {
            error.innerText = "Please, fill step number feild!";
            $("#err").removeClass("hide");
        } else if (description == "") {
            error.innerText = "Please, fill description feild!";
            $("#err").removeClass("hide");
        } else if (stepNumber != "" && description != "") {
            $("#err").addClass("hide");
            var data = $("#nosebleedForm")[0];
            var formData = new FormData(data);
            var files = $('#instructionPicture')[0].files;
            formData.append('file', files[0]);
            $.ajax({
                url: 'savenosebleed',
                type: 'post',
                data: formData,
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                success: function(response) {
                    setTimeout(function() {
                        document.getElementById('loader-wrapper2').style.display = 'none';
                        document.getElementById('modal1').style.display = 'block';
                        setTimeout(function() { document.getElementById('modal1').style.display = 'none'; }, 1000);
                    }, 1000);
                },
            });
        } else {
            $("#err").addClass("hide");
        }

    });
});