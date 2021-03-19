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

function loadrequests() {
    document.getElementById("requestHistory").style.display = "block";
    document.getElementById("requestHistory").innerHTML = "";
    document.getElementById("history2").style.border = "3px solid rgb(255, 255, 255, 0.6)";
    document.getElementById("history2").style.background = "rgb(245, 245, 255, 0.2)";
    document.getElementById("history1").style.border = "3px solid black";
    document.getElementById("history1").style.background = "rgb(245, 245, 255, 0.6)";
    $("#requestHistory").load('getrequesthistory');
}

function loadfeedbacks() {
    document.getElementById("requestHistory").style.display = "block";
    document.getElementById("requestHistory").innerHTML = "";
    document.getElementById("history1").style.border = "3px solid rgb(255, 255, 255, 0.6)";
    document.getElementById("history1").style.background = "rgb(245, 245, 255, 0.2)";
    document.getElementById("history2").style.border = "3px solid black";
    document.getElementById("history2").style.background = "rgb(245, 245, 255, 0.6)";
    $("#requestHistory").load('getfeedbackhistory');
}

function closebtn() {
    document.getElementById("requestHistory").style.display = "none";
}