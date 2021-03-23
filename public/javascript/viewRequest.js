var modal = document.getElementById("zoomImg");
var elements = document.getElementsByClassName("idImg1");
var modalImg = document.getElementById("img");
var nav = document.getElementById("navbar");
var breadcrumb = document.getElementById("breadcrum");

function zoom(e) {
    modal.style.display = "block";
    modalImg.src = e.src;
    nav.style.display = "none";
    breadcrumb.style.display = "none";
}

var closeImg = document.getElementsByClassName("close")[0];

closeImg.onclick = function() {
    modal.style.display = "none";
    nav.style.display = "block";
    breadcrumb.style.display = "block";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        nav.style.display = "block";
        breadcrumb.style.display = "block";
    }
}


$('#acceptform').click(function(event) {
    event.preventDefault();
    var requestId = document.getElementById("requestId1").value;
    var sendbtns = document.getElementById("sendbtns");
    $.ajax({
        url: 'acceptrequest',
        method: 'post',
        data: { requestId: requestId },
        success: function() {
            document.getElementById("loading").style.display = "block";
            document.getElementById("sendbtns").style.opacity = "0.5";
            setTimeout(() => {
                sendbtns.style.display = "none";
                document.getElementById("accepted").style.display = "block";
            }, 1000);
        }
    });
});

$('#rejectform').click(function(event) {
    event.preventDefault();
    var requestId = document.getElementById("requestId2").value;
    var sendbtns = document.getElementById("sendbtns");
    $.ajax({
        url: 'rejectrequest',
        method: 'post',
        data: { requestId: requestId },
        success: function() {
            setTimeout(() => {
                sendbtns.style.display = "none";
                document.getElementById("rejected").style.display = "block";
                closeconfirm();
            }, 1500);
        }
    });
});

$("#send").click(function(event) {
    event.preventDefault();
    var requestId = document.getElementById("requestId3").value;
    var message = document.getElementById("message").value;
    if (message != "") {
        $.ajax({
            url: 'sendmessage',
            method: 'post',
            data: { message: message, requestId: requestId },
            success: function(response) {
                document.getElementById("messageForm").reset();
                document.getElementById('modal2').style.display = 'block';
                setTimeout(function() {
                    document.getElementById('modal2').style.display = 'none';
                }, 1000);
            },
        });
    }
});


function confirm() {
    document.getElementById('modal1').style.display = 'block';
    var nav = document.getElementById("navbar");
    var breadcrumb = document.getElementById("breadcrum");
    nav.style.display = "none";
    breadcrumb.style.display = "none";

}

function closeconfirm() {
    document.getElementById('modal1').style.display = 'none';
    var nav = document.getElementById("navbar");
    var breadcrumb = document.getElementById("breadcrum");
    nav.style.display = "block";
    breadcrumb.style.display = "block";
}

// -----------------------------------------------------

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }

    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slides[slideIndex - 1].style.display = "block";
}