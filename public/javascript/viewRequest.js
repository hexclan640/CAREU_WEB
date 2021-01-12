$('#acceptform').click(function(event) {
    event.preventDefault();
    var requestId = document.getElementById("requestId1").value;
    var sendbtns = document.getElementById("sendbtns");
    $.ajax({
        url: 'acceptrequest',
        method: 'post',
        data: { requestId: requestId },
        success: function() {
            document.getElementById("loading").style.display = "block";
            document.getElementById("sendbtns").style.opacity = "0.5";
            setTimeout(() => {
                sendbtns.style.display = "none";
                document.getElementById("accepted").style.display = "block";
            }, 1500);
        }
    });
});

$('#rejectform').click(function(event) {
    event.preventDefault();
    var requestId = document.getElementById("requestId2").value;
    var sendbtns = document.getElementById("sendbtns");
    $.ajax({
        url: 'rejectrequest',
        method: 'post',
        data: { requestId: requestId },
        success: function() {
            setTimeout(() => {
                sendbtns.style.display = "none";
                document.getElementById("rejected").style.display = "block";
                closeconfirm();
            }, 1500);
        }
    });
});

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