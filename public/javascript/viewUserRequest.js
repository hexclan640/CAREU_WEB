var modal = document.getElementById("zoomImg");
var img1 = document.getElementById("idImg1");
var img2 = document.getElementById("idImg2");
var modalImg = document.getElementById("img");
var nav = document.getElementById("navbar");
var breadcrumb = document.getElementById("breadcrum");

img1.onclick = function() {
    modal.style.display = "block";
    modalImg.src = this.src;
    nav.style.display = "none";
    breadcrumb.style.display = "none";
}

img2.onclick = function() {
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
    nav.style.display = "none";
    breadcrumb.style.display = "none";
}

function closeconfirm2() {
    document.getElementById('modal2').style.display = 'none';
    var nav = document.getElementById("navbar");
    var breadcrumb = document.getElementById("breadcrum");
    nav.style.display = "none";
    breadcrumb.style.display = "none";
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
    }
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}