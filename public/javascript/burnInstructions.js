function confirm(id) {
    document.getElementById("yes").href = "deleteburn?id=" + id;
    document.getElementById('modal3').style.display = 'block';
    var nav = document.getElementById("navbar");
    var breadcrumb = document.getElementById("breadcrum");
    nav.style.display = "none";
    breadcrumb.style.display = "none";

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