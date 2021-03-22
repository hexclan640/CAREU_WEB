$(document).ready(function() {
    $("#col1").load('getpoliceoperators');
    $("#col2").load('getsuwasariyaoperators');
});

function confirm1(id) {
    document.getElementById('modal1').style.display = 'block';
    var nav = document.getElementById("navbar");
    var breadcrumb = document.getElementById("breadcrum");
    nav.style.display = "none";
    breadcrumb.style.display = "none";
    document.getElementById("yes1").onclick = function(e) {
        e.preventDefault();
        $.ajax({
            url: "romoveoperator119",
            method: "post",
            data: { id: id },
            success: function(data) {
                $("#col1").load('getpoliceoperators');
                closeconfirm1();
            }
        });
    }
}

function closeconfirm1() {
    document.getElementById('modal1').style.display = 'none';
    var nav = document.getElementById("navbar");
    var breadcrumb = document.getElementById("breadcrum");
    nav.style.display = "block";
    breadcrumb.style.display = "block";
}

function confirm2(id) {
    document.getElementById('modal2').style.display = 'block';
    var nav = document.getElementById("navbar");
    var breadcrumb = document.getElementById("breadcrum");
    nav.style.display = "none";
    breadcrumb.style.display = "none";
    document.getElementById("yes2").onclick = function(e) {
        e.preventDefault();
        $.ajax({
            url: "romoveoperator1990",
            method: "post",
            data: { id: id },
            success: function(data) {
                $("#col2").load('getsuwasariyaoperators');
                closeconfirm2();
            }
        });
    }
}

function closeconfirm2() {
    document.getElementById('modal2').style.display = 'none';
    var nav = document.getElementById("navbar");
    var breadcrumb = document.getElementById("breadcrum");
    nav.style.display = "block";
    breadcrumb.style.display = "block";
}