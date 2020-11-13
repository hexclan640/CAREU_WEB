function moreless() {
    var col2lable = document.getElementById("more1");
    var details = document.getElementById("more2");
    var btn = document.getElementById("more");

    if (col2lable.style.display != "block" && details.style.display != "block") {
        col2lable.style.display = "block";
        details.style.display = "block";
        btn.innerHTML = "LESS";
    } else {
        col2lable.style.display = "none";
        details.style.display = "none";
        btn.innerHTML = "MORE";
    }
}