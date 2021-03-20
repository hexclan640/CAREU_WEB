var modal = document.getElementById("zoomImg");
var elements = document.getElementsByClassName("idImg1");
var modalImg = document.getElementById("img");
var nav = document.getElementById("navbar");
var breadcrumb = document.getElementById("breadcrum");

elements[0].onclick = function() {
    modal.style.display = "block";
    modalImg.src = this.src;
    nav.style.display = "none";
    breadcrumb.style.display = "none";
}

elements[1].onclick = function() {
    modal.style.display = "block";
    modalImg.src = this.src;
    nav.style.display = "none";
    breadcrumb.style.display = "none";
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
    nav.style.display = "none";
    breadcrumb.style.display = "none";

}

function confirm2() {
    document.getElementById('modal2').style.display = 'block';
    var nav = document.getElementById("navbar");
    var breadcrumb = document.getElementById("breadcrum");
    nav.style.display = "none";
    breadcrumb.style.display = "none";

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
    $.ajax({
        url: "accept",
        type: "post",
        data: { id: id },
        success: function(data) {
            closeconfirm1();
            document.getElementById('column4').style.display = 'none';
        },
    });
}

function reject(id) {
    $.ajax({
        url: "reject",
        type: "post",
        data: { id: id },
        success: function(data) {
            closeconfirm2();
            document.getElementById('column4').style.display = 'none';
        },
    });
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