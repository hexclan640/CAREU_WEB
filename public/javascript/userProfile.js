function confirm(id) {
    document.getElementById('modal1').style.display = 'block';

    document.getElementById("blockyes").onclick = function(e) {
        e.preventDefault();
        document.getElementById('loader-wrapper2').style.display = "block";
        closeconfirm();
        $.ajax({
            url: "block",
            method: "post",
            data: { id: id },
            success: function(data) {
                document.getElementById("blockbtn").style.display = "none";
                document.getElementById('note').innerText = 'User was blocked and informing email has been sent.';
                document.getElementById('note').style.background = "rgba(192, 34, 34, 0.589)";
                document.getElementById('note').style.border = "2px solid rgb(146, 0, 0)"
                document.getElementById('note').style.color = "rgb(95, 3, 3)";
                document.getElementById('note').style.display = "block";
                document.getElementById('loader-wrapper2').style.display = "none";
            }
        });
    }

}

function closeconfirm() {
    document.getElementById('modal1').style.display = 'none';
    var nav = document.getElementById("navbar");
    var breadcrumb = document.getElementById("breadcrum");
}

function viewrequests() {
    document.getElementById('loader-wrapper2').style.display = "block";
    document.getElementById("requestHistory").style.display = "block";
    document.getElementById("requestHistory").innerHTML = "";
    document.getElementById("history2").style.border = "3px solid rgb(255, 255, 255, 0.6)";
    document.getElementById("history2").style.background = "rgb(245, 245, 255, 0.2)";
    document.getElementById("history1").style.border = "3px solid black";
    document.getElementById("history1").style.background = "rgb(245, 245, 255, 0.6)";
    setTimeout(function() {
        $("#requestHistory").load('getrequesthistory');
        document.getElementById('loader-wrapper2').style.display = "none";
    }, 1000);
}

function viewfeedback() {
    document.getElementById('loader-wrapper2').style.display = "block";
    document.getElementById("requestHistory").style.display = "block";
    document.getElementById("requestHistory").innerHTML = "";
    document.getElementById("history1").style.border = "3px solid rgb(255, 255, 255, 0.6)";
    document.getElementById("history1").style.background = "rgb(245, 245, 255, 0.2)";
    document.getElementById("history2").style.border = "3px solid black";
    document.getElementById("history2").style.background = "rgb(245, 245, 255, 0.6)";
    setTimeout(function() {
        $("#requestHistory").load('getfeedbackhistory');
        document.getElementById('loader-wrapper2').style.display = "none";
    }, 1000);
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