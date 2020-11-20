function moreless() {
    var col2lable = document.getElementById("more1");
    var details = document.getElementById("more2");
    var moreless = document.getElementById("morelessbtn");

    if (col2lable.style.display != "block" && details.style.display != "block") {
        col2lable.style.display = "block";
        details.style.display = "block";
        moreless.src = "../img/up.svg";
    } else {
        col2lable.style.display = "none";
        details.style.display = "none";
        moreless.src = "../img/down.svg";
    }
}

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