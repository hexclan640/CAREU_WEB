var modal = document.getElementById("zoomImg");
var elements = document.getElementsByClassName("idImg1");
var modalImg = document.getElementById("img");
var nav = document.getElementById("navbar");
var breadcrumb = document.getElementById("breadcrum");

elements[0].onclick = function() {
    modal.style.display = "block";
    modalImg.src = this.src;
    // nav.style.display = "none";
    // breadcrumb.style.display = "none";
}

elements[1].onclick = function() {
    modal.style.display = "block";
    modalImg.src = this.src;
    // nav.style.display = "none";
    // breadcrumb.style.display = "none";
}

var closeImg = document.getElementsByClassName("close")[0];

closeImg.onclick = function() {
    modal.style.display = "none";
    nav.style.display = "block";
    breadcrumb.style.display = "block";
}

function confirm1() {
    document.getElementById('modal1').style.display = 'block';
    var nav = document.getElementById("navbar");
    var breadcrumb = document.getElementById("breadcrum");
}

function confirm2() {
    document.getElementById('modal2').style.display = 'block';
    var nav = document.getElementById("navbar");
    var breadcrumb = document.getElementById("breadcrum");
}

function closeconfirm1() {
    document.getElementById('modal1').style.display = 'none';
    var nav = document.getElementById("navbar");
    var breadcrumb = document.getElementById("breadcrum");
    nav.style.display = "block";
    breadcrumb.style.display = "block";
}

function closeconfirm2() {
    document.getElementById('modal2').style.display = 'none';
    var nav = document.getElementById("navbar");
    var breadcrumb = document.getElementById("breadcrum");
    nav.style.display = "block";
    breadcrumb.style.display = "block";
}

function accept(id) {
    document.getElementById('loader-wrapper2').style.display = "block";
    $.ajax({
        url: "accept",
        type: "post",
        data: { id: id },
        success: function(data) {
            document.getElementById('note').innerText = 'Account activation successfull and confirmation email has been sent.';
            document.getElementById('note').style.background = "rgba(139, 245, 112, 0.637)";
            document.getElementById('note').style.border = "2px solid rgb(0, 122, 31)"
            document.getElementById('note').style.color = "rgb(0, 122, 31)";
            document.getElementById('note').style.display = "block";
            document.getElementById('loader-wrapper2').style.display = "none";
        },
    });
    closeconfirm1();
    document.getElementById('acceptbtn').style.display = 'none';
    document.getElementById('rejectbtn').style.display = 'none';
}

function reject(id) {
    document.getElementById('loader-wrapper2').style.display = "block";
    $.ajax({
        url: "reject",
        type: "post",
        data: { id: id },
        success: function(data) {
            document.getElementById('note').innerText = 'Account was not activated and informing email has been sent.';
            document.getElementById('note').style.background = "rgba(192, 34, 34, 0.589)";
            document.getElementById('note').style.border = "2px solid rgb(146, 0, 0)"
            document.getElementById('note').style.color = "rgb(95, 3, 3)";
            document.getElementById('note').style.display = "block";
            document.getElementById('loader-wrapper2').style.display = "none";
        },
    });
    closeconfirm2();
    document.getElementById('acceptbtn').style.display = 'none';
    document.getElementById('rejectbtn').style.display = 'none';
}

var modal1 = document.getElementById('modal1');
var modal2 = document.getElementById('modal2');

window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
}

window.onclick = function(event) {
    if (event.target == modal2) {
        modal2.style.display = "none";
        nav.style.display = "block";
        breadcrumb.style.display = "block";
    }
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        nav.style.display = "block";
        breadcrumb.style.display = "block";
    }
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
    dots[slideIndex - 1].className += " active";
}