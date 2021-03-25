$(document).ready(function() {
    $("#col1").load('getpoliceoperators');
    $("#col2").load('getsuwasariyaoperators');
});

function confirm1(id) {
    document.getElementById('modal1').style.display = 'block';
    document.getElementById("yes1").onclick = function(e) {
        e.preventDefault();
        document.getElementById('loader-wrapper2').style.display = "block";
        document.getElementById('modal1').style.display = 'none';
        $.ajax({
            url: "romoveoperator119",
            method: "post",
            data: { id: id },
            success: function(data) {
                setTimeout(function() {
                    document.getElementById('loader-wrapper2').style.display = 'none';
                    document.getElementById('modal3').style.display = 'block';
                    $("#col1").load('getpoliceoperators');
                    setTimeout(function() { document.getElementById('modal3').style.display = 'none'; }, 1000);
                }, 1000);
            }
        });
    }
}

function confirm2(id) {
    document.getElementById('modal2').style.display = 'block';
    document.getElementById("yes2").onclick = function(e) {
        e.preventDefault();
        document.getElementById('loader-wrapper2').style.display = "block";
        document.getElementById('modal2').style.display = 'none';
        $.ajax({
            url: "romoveoperator1990",
            method: "post",
            data: { id: id },
            success: function(data) {
                setTimeout(function() {
                    document.getElementById('loader-wrapper2').style.display = 'none';
                    document.getElementById('modal3').style.display = 'block';
                    $("#col2").load('getsuwasariyaoperators');
                    setTimeout(function() { document.getElementById('modal3').style.display = 'none'; }, 1000);
                }, 1000);
            }
        });
    }
}

function closeconfirm1() {
    document.getElementById("modal1").style.display = "none";
}

function closeconfirm2() {
    document.getElementById("modal2").style.display = "none";
}