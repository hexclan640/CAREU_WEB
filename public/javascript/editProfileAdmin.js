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

    $("#submit").click(function(event) {
        event.preventDefault();

        var firstname = $("#firstName").val();
        var lastname = $("#lastName").val();
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
            var data = $("#updateprofile")[0];
            var formData = new FormData(data);
            var files = $('#propic')[0].files;
            formData.append('file', files[0]);
            $.ajax({
                url: 'updateprofile',
                type: 'post',
                data: formData,
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                success: function(response) {
                    // if (response != 0) {
                    //     $("#img").attr("src", response);
                    //     $(".preview img").show(); // Display image element
                    // } else {
                    //     alert('file not uploaded');
                    // }
                    document.getElementById('modal1').style.display = 'block';
                    setTimeout(function() { document.getElementById('modal1').style.display = 'none'; }, 2000);
                },
            });
        } else {
            $("#err").addClass("hide");
        }
    });
});