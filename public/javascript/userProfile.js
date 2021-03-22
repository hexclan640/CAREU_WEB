function confirm(id) {
    document.getElementById('modal1').style.display = 'block';
    var nav = document.getElementById("navbar");
    var breadcrumb = document.getElementById("breadcrum");
    nav.style.display = "none";
    breadcrumb.style.display = "none";

    document.getElementById("blockyes").onclick = function(e) {
        e.preventDefault();
        $.ajax({
            url: "block",
            method: "post",
            data: { id: id },
            success: function(data) {
                document.getElementById("column4").style.display = "none";
                closeconfirm();
            }
        });
    }

}

function closeconfirm() {
    document.getElementById('modal1').style.display = 'none';
    var nav = document.getElementById("navbar");
    var breadcrumb = document.getElementById("breadcrum");
    nav.style.display = "block";
    breadcrumb.style.display = "block";
}

function viewrequests() {
    document.getElementById("requestHistory").style.display = "block";
    document.getElementById("requestHistory").innerHTML = "";
    document.getElementById("history2").style.border = "3px solid rgb(255, 255, 255, 0.6)";
    document.getElementById("history2").style.background = "rgb(245, 245, 255, 0.2)";
    document.getElementById("history1").style.border = "3px solid black";
    document.getElementById("history1").style.background = "rgb(245, 245, 255, 0.6)";
    $("#requestHistory").load('getrequesthistory');
}

function viewfeedback() {
    document.getElementById("requestHistory").style.display = "block";
    document.getElementById("requestHistory").innerHTML = "";
    document.getElementById("history1").style.border = "3px solid rgb(255, 255, 255, 0.6)";
    document.getElementById("history1").style.background = "rgb(245, 245, 255, 0.2)";
    document.getElementById("history2").style.border = "3px solid black";
    document.getElementById("history2").style.background = "rgb(245, 245, 255, 0.6)";
    $("#requestHistory").load('getfeedbackhistory');
}

var request = 0;
var feedback = 0;

function loadrequests() {
    if (request == 0 && feedback == 0) {
        viewrequests();
        request++;
    } else if (request == 0 && feedback == 1) {
        viewrequests();
        request++;
        feedback--;
    } else if (request == 1) {
        closebtn();
        document.getElementById("history1").style.border = "3px solid rgb(255, 255, 255, 0.6)";
        document.getElementById("history1").style.background = "rgb(245, 245, 255, 0.2)";
        request--;
    }
}

function loadfeedbacks() {
    if (request == 0 && feedback == 0) {
        viewfeedback();
        feedback++;
    } else if (request == 1 && feedback == 0) {
        viewfeedback();
        feedback++;
        request--;
    } else if (feedback == 1) {
        closebtn();
        document.getElementById("history1").style.border = "3px solid rgb(255, 255, 255, 0.6)";
        document.getElementById("history1").style.background = "rgb(245, 245, 255, 0.2)";
        feedback--;
    }
}

function closebtn() {
    document.getElementById("requestHistory").style.display = "none";
}