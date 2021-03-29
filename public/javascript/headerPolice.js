$(document).ready(function() {
    window.onscroll = function() {
        var breadcrum = document.getElementById("breadcrum");
        var sticky = navbar.offsetTop;

        if (window.pageYOffset >= sticky) {
            breadcrum.classList.add("sticky")
            document.getElementById("breadcrum").style.padding = "0.5rem";
        }
        if (window.pageYOffset <= sticky) {
            breadcrum.classList.remove("sticky");
            document.getElementById("breadcrum").style.padding = "0.1px";
        }
    }
});