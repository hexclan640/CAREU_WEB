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


$('#accept').click(function(event) {
    event.preventDefault();
    document.getElementById('loader-wrapper2').style.display = "block";
    var requestId = document.getElementById("requestId1").value;
    $.ajax({
        url: 'acceptrequest',
        method: 'post',
        data: { requestId: requestId },
        success: function(response) {
            setTimeout(function() {
                document.getElementById('acceptform').style.display = "none";
                document.getElementById('rejectbtn').style.display = "none";
                document.getElementById('note').innerText = 'Accepted';
                document.getElementById('note').style.background = "rgba(139, 245, 112, 0.637)";
                document.getElementById('note').style.border = "2px solid rgb(0, 122, 31)"
                document.getElementById('note').style.color = "rgb(0, 122, 31)";
                document.getElementById('note').style.display = "block";
                document.getElementById('loader-wrapper2').style.display = "none";
            }, 1000);
        },
    });
});

$('#rejectform').click(function(event) {
    event.preventDefault();
    document.getElementById('loader-wrapper2').style.display = "block";
    closeconfirm();
    var requestId = document.getElementById("requestId2").value;
    $.ajax({
        url: 'rejectrequest',
        method: 'post',
        data: { requestId: requestId },
        success: function(response) {
            setTimeout(function() {
                document.getElementById('acceptform').style.display = "none";
                document.getElementById('rejectbtn').style.display = "none";
                document.getElementById('note').innerText = 'Rejected';
                document.getElementById('note').style.background = "rgba(192, 34, 34, 0.589)";
                document.getElementById('note').style.border = "2px solid rgb(146, 0, 0)"
                document.getElementById('note').style.color = "rgb(95, 3, 3)";
                document.getElementById('note').style.display = "block";
                document.getElementById('loader-wrapper2').style.display = "none";
            }, 1000);
        },
    });
});

$("#send").click(function(event) {
    event.preventDefault();
    document.getElementById('loader-wrapper2').style.display = "block";
    var requestId = document.getElementById("requestId3").value;
    var message = document.getElementById("message").value;
    if (message != "") {
        $.ajax({
            url: 'sendmessage',
            method: 'post',
            data: { message: message, requestId: requestId },
            success: function(response) {
                setTimeout(function() {
                    document.getElementById("messageForm").reset();
                    document.getElementById('modal2').style.display = 'block';
                    document.getElementById('loader-wrapper2').style.display = "none";
                    setTimeout(function() {
                        document.getElementById('modal2').style.display = 'none';
                    }, 1000);
                }, 1000);
            },
        });
    }
});


function confirm() {
    document.getElementById('modal1').style.display = 'block';
}

function closeconfirm() {
    document.getElementById('modal1').style.display = 'none';
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