var modal = document.getElementById("zoomImg");
var img1 = document.getElementById("myImg1");
var img2 = document.getElementById("myImg2");
var modalImg = document.getElementById("img");
var nav = document.getElementById("navbar")

img1.onclick = function() {
    modal.style.display = "block";
    modalImg.src = this.src;
    nav.style.display = "none";
}

img2.onclick = function() {
    modal.style.display = "block";
    modalImg.src = this.src;
    nav.style.display = "none";
}

var closeImg = document.getElementsByClassName("close")[0];

closeImg.onclick = function() {
    modal.style.display = "none";
    nav.style.display = "block";
}