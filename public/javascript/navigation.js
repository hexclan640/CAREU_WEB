// $(document).ready(function(){
// 	$('.header').sticky();
// });

var i = 0;
var txt = 'ADMIN PANEL';
var speed = 50;

function typeWriter() {
    // while (true) {
    if (i < txt.length) {
        document.getElementById("demo").innerHTML += txt.charAt(i);
        i++;
        setTimeout(typeWriter, speed);
    }
    // if (i == txt.length) {
    //     document.getElementById("demo").innerHTML -= txt.charAt(i);
    //     i--;
    //     setTimeout(typeWriter, speed);
    // }
    // }
}