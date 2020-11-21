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
        // var i = 0;
        // var txt = "SUWASARIYA-1990";
        // setInterval(function() {
        //     if (i < txt.length) {
        //         document.getElementById("service").innerHTML += txt.charAt(i);
        //         i++;
        //     }
        // }, 200);

    // setInterval(function() {
    //     if (i == txt.length) {
    //         document.getElementById("service").innerHTML = "";
    //         i = 0;
    //     }
    // }, 4099);
});