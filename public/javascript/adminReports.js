$(document).ready(function() {
    $.ajax({
        url: 'flagcountadmin',
        method: 'post',
        success: function(data) {
            var dataset = data.split(" ");
            var count = parseInt(dataset[0]) + parseInt(dataset[1]) + parseInt(dataset[2]) + parseInt(dataset[3]);
            document.getElementById("admintitle1").innerHTML = "Total Requests - " + count;
            var ctx = document.getElementById('adminChart1').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Not Viewed', 'Accepted', 'Rejected', 'Blocked'],
                    datasets: [{
                        label: 'Requests',
                        data: [dataset[0], dataset[1], dataset[2], dataset[3]],
                        backgroundColor: [
                            'rgba(54, 162, 235)',
                            'rgba(75, 192, 192)',
                            'rgba(255, 99, 132)',
                            'rgba(255, 206, 86)'
                        ],
                        borderColor: [
                            'rgba(255, 255, 255)',
                            'rgba(255, 255, 255)',
                            'rgba(255, 255, 255)',
                            'rgba(255, 255, 255)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    });
    $.ajax({
        url: 'countofeachserviceadmin',
        method: 'post',
        success: function(data) {
            var dataset = data.split(" ");
            var count = parseInt(dataset[0]) + parseInt(dataset[1]);
            document.getElementById("admintitle2").innerHTML = "Total Requests - " + count;
            var ctx = document.getElementById('adminChart2').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Police-119', 'Suwasariya-1990'],
                    datasets: [{
                        label: 'Requests',
                        data: [dataset[0], dataset[1], dataset[2], dataset[3]],
                        backgroundColor: [
                            'rgba(145, 19, 0)',
                            'rgba(4, 135, 28)'
                        ],
                        borderColor: 'rgba(255, 255, 255)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    });

    $.ajax({
        url: 'weekbyweekservicerequests',
        method: 'post',
        success: function(data) {
            console.log(data);
            var dataset = data.split(" ");
            var ctx = document.getElementById('adminChart3').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Police', 'Suwasariya', '', 'Police', 'Suwasariya', '', 'Police', 'Suwasariya', '', 'Police', 'Suwasariya'],
                    datasets: [{
                        label: 'Requests',
                        data: [dataset[0], dataset[1], 0, dataset[2], dataset[3], 0, dataset[4], dataset[5], 0, dataset[6], dataset[7]],
                        backgroundColor: [
                            'rgba(145, 19, 0)',
                            'rgba(4, 135, 28)',
                            'rgba(255, 255, 255)',
                            'rgba(145, 19, 0)',
                            'rgba(4, 135, 28)',
                            'rgba(255, 255, 255)',
                            'rgba(145, 19, 0)',
                            'rgba(4, 135, 28)',
                            'rgba(255, 255, 255)',
                            'rgba(145, 19, 0)',
                            'rgba(4, 135, 28)'
                        ],
                        borderColor: 'rgba(255, 255, 255)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    });

    $.ajax({
        url: 'flagcountpolice',
        method: 'post',
        success: function(data) {
            var dataset = data.split(" ");
            var count = parseInt(dataset[0]) + parseInt(dataset[1]) + parseInt(dataset[2]) + parseInt(dataset[3]);
            document.getElementById("policetitle1").innerHTML = "Total Requests - " + count;
            var ctx = document.getElementById('policeChart1').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Not Viewed', 'Accepted', 'Rejected', 'Timeout'],
                    datasets: [{
                        label: 'Requests',
                        data: [dataset[0], dataset[1], dataset[2], dataset[3]],
                        backgroundColor: [
                            'rgba(54, 162, 235)',
                            'rgba(75, 192, 192)',
                            'rgba(255, 99, 132)',
                            'rgba(255, 206, 86)'
                        ],
                        borderColor: [
                            'rgba(255, 255, 255)',
                            'rgba(255, 255, 255)',
                            'rgba(255, 255, 255)',
                            'rgba(255, 255, 255)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    });

    $.ajax({
        url: 'categorycountpolice',
        method: 'post',
        success: function(data) {
            var dataset = data.split(" ");
            var ctx = document.getElementById('policeChart2').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Accident', 'Crime', 'Robbery', 'Other'],
                    datasets: [{
                        label: 'Requests',
                        data: [dataset[0], dataset[1], dataset[2], dataset[3]],
                        backgroundColor: [
                            'rgba(235, 52, 52)',
                            'rgba(235, 214, 52)',
                            'rgba(235, 52, 235)',
                            'rgba(52, 235, 226)'
                        ],
                        borderColor: [
                            'rgba(255, 255, 255)',
                            'rgba(255, 255, 255)',
                            'rgba(255, 255, 255)',
                            'rgba(255, 255, 255)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    });

    $.ajax({
        url: 'districtcountpolice',
        method: 'post',
        success: function(data) {
            var dataset = data.split(" ");
            var ctx = document.getElementById('policeChart3').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Ampara', 'Anuradhapura', 'Badulla', 'Batticola', 'Colombo', 'Galle', 'Gampaha', 'Hambanthota', 'Jaffna', 'Kaluthatra', 'Kandy', 'Kegalle', 'Kilinochchi', 'Kurunagala', 'Mannar', 'Mathale', 'Mathara', 'Monaragala', 'Mulathivu', 'Nuwara Eliya', 'Polonnaruwa', 'Puththalam', 'Rathnapura', 'Trincomalee', 'Vavuniya'],
                    datasets: [{
                        label: 'Requests',
                        data: [dataset[0], dataset[1], dataset[2], dataset[3], dataset[4], dataset[5], dataset[6], dataset[7], dataset[8], dataset[9], dataset[10], dataset[11], dataset[12], dataset[13], dataset[14], dataset[15], dataset[16], dataset[17], dataset[18], dataset[19], dataset[20], dataset[21], dataset[22], dataset[23], dataset[24]],
                        backgroundColor: 'rgba(245, 78, 78)',
                        borderColor: 'rgba(237, 0, 0)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    });

    $.ajax({
        url: 'flagcountsuwasariya',
        method: 'post',
        success: function(data) {
            var dataset = data.split(" ");
            var count = parseInt(dataset[0]) + parseInt(dataset[1]) + parseInt(dataset[2]) + parseInt(dataset[3]);
            document.getElementById("suwasariyatitle1").innerHTML = "Total Requests - " + count;
            var ctx = document.getElementById('suwasariyaChart1').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Not Viewed', 'Accepted', 'Rejected', 'Timeout'],
                    datasets: [{
                        label: 'Requests',
                        data: [dataset[0], dataset[1], dataset[2], dataset[3]],
                        backgroundColor: [
                            'rgba(54, 162, 235)',
                            'rgba(75, 192, 192)',
                            'rgba(255, 99, 132)',
                            'rgba(255, 206, 86)'
                        ],
                        borderColor: [
                            'rgba(255, 255, 255)',
                            'rgba(255, 255, 255)',
                            'rgba(255, 255, 255)',
                            'rgba(255, 255, 255)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    });

    $.ajax({
        url: 'patientcountsuwasariya',
        method: 'post',
        success: function(data) {
            var dataset = data.split(" ");
            var count = parseInt(dataset[0]) + parseInt(dataset[1]) + parseInt(dataset[2]) + parseInt(dataset[3]) + parseInt(dataset[4]) + parseInt(dataset[5]);
            document.getElementById("suwasariyatitle2").innerHTML = "Number of Patients - " + count;
            var ctx = document.getElementById('suwasariyaChart2').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['1', '2', '3', '4', '5', 'More Than 5'],
                    datasets: [{
                        label: 'Requests',
                        data: [dataset[0], dataset[1], dataset[2], dataset[3], dataset[4], dataset[5]],
                        backgroundColor: [
                            'rgba(66, 245, 179)',
                            'rgba(235, 214, 52)',
                            'rgba(235, 52, 235)',
                            'rgba(52, 105, 226)',
                            'rgba(66, 167, 245)',
                            'rgba(235, 52, 52)'
                        ],
                        borderColor: 'rgba(255, 255, 255)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    });

    $.ajax({
        url: 'districtcountsuwasariya',
        method: 'post',
        success: function(data) {
            var dataset = data.split(" ");
            var ctx = document.getElementById('suwasariyaChart3').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Ampara', 'Anuradhapura', 'Badulla', 'Batticola', 'Colombo', 'Galle', 'Gampaha', 'Hambanthota', 'Jaffna', 'Kaluthatra', 'Kandy', 'Kegalle', 'Kilinochchi', 'Kurunagala', 'Mannar', 'Mathale', 'Mathara', 'Monaragala', 'Mulathivu', 'Nuwara Eliya', 'Polonnaruwa', 'Puththalam', 'Rathnapura', 'Trincomalee', 'Vavuniya'],
                    datasets: [{
                        label: 'Requests',
                        data: [dataset[0], dataset[1], dataset[2], dataset[3], dataset[4], dataset[5], dataset[6], dataset[7], dataset[8], dataset[9], dataset[10], dataset[11], dataset[12], dataset[13], dataset[14], dataset[15], dataset[16], dataset[17], dataset[18], dataset[19], dataset[20], dataset[21], dataset[22], dataset[23], dataset[24]],
                        backgroundColor: 'rgba(245, 78, 78)',
                        borderColor: 'rgba(237, 0, 0)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    });
});


function exportpdfadmin() {
    var selection = document.getElementById("adminoptions").value;
    if (selection != "select") {
        if (selection == 1) {
            document.getElementById("pdfbtnadmin").href = "adminpdfreport1";
        } else if (selection == 2) {
            document.getElementById("pdfbtnadmin").href = "adminpdfreport2";
        } else if (selection == 3) {
            document.getElementById("pdfbtnadmin").href = "adminpdfreport3";
        } else if (selection == 4) {
            document.getElementById("pdfbtnadmin").href = "adminpdfreport4";
        } else if (selection == 5) {
            document.getElementById("pdfbtnadmin").href = "adminpdfreport5";
        } else if (selection == 6) {
            document.getElementById("pdfbtnadmin").href = "adminpdfreport6";
        } else if (selection == 7) {
            document.getElementById("pdfbtnadmin").href = "adminpdfreport7";
        } else if (selection == 8) {
            document.getElementById("pdfbtnadmin").href = "adminpdfreport8";
        }
        return true;
    }
}

function exportexeladmin() {
    var selection = document.getElementById("adminoptions").value;
    if (selection != "select") {
        if (selection == 1) {
            document.getElementById("excelbtnadmin").href = "adminexcelreport1";
        } else if (selection == 2) {
            document.getElementById("excelbtnadmin").href = "adminexcelreport2";
        } else if (selection == 3) {
            suwasariya
            document.getElementById("excelbtnadmin").href = "adminexcelreport3";
        } else if (selection == 4) {
            document.getElementById("excelbtnadmin").href = "adminexcelreport4";
        } else if (selection == 5) {
            document.getElementById("excelbtnadmin").href = "adminexcelreport5";
        } else if (selection == 6) {
            document.getElementById("excelbtnadmin").href = "adminexcelreport6";
        } else if (selection == 7) {
            document.getElementById("excelbtnadmin").href = "adminexcelreport7";
        } else if (selection == 8) {
            document.getElementById("excelbtnadmin").href = "adminexcelreport8";
        }
        return true;
    }
}


function exportpdfpolice() {
    var selection = document.getElementById("policeoptions").value;
    if (selection != "select") {
        if (selection == 1) {
            document.getElementById("pdfbtnpolice").href = "policepdfreport1";
        } else if (selection == 2) {
            document.getElementById("pdfbtnpolice").href = "policepdfreport2";
        } else if (selection == 3) {
            document.getElementById("pdfbtnpolice").href = "policepdfreport3";
        } else if (selection == 4) {
            document.getElementById("pdfbtnpolice").href = "policepdfreport4";
        } else if (selection == 5) {
            document.getElementById("pdfbtnpolice").href = "policepdfreport5";
        } else if (selection == 6) {
            document.getElementById("pdfbtnpolice").href = "policepdfreport6";
        } else if (selection == 7) {
            document.getElementById("pdfbtnpolice").href = "policepdfreport7";
        } else if (selection == 8) {
            document.getElementById("pdfbtnpolice").href = "policepdfreport8";
        }
        return true;
    }
}

function exportexelpolice() {
    var selection = document.getElementById("policeoptions").value;
    if (selection != "select") {
        if (selection == 1) {
            document.getElementById("excelbtnpolice").href = "policeexcelreport1";
        } else if (selection == 2) {
            document.getElementById("excelbtnpolice").href = "policeexcelreport2";
        } else if (selection == 3) {
            suwasariya
            document.getElementById("excelbtnpolice").href = "policeexcelreport3";
        } else if (selection == 4) {
            document.getElementById("excelbtnpolice").href = "policeexcelreport4";
        } else if (selection == 5) {
            document.getElementById("excelbtnpolice").href = "policeexcelreport5";
        } else if (selection == 6) {
            document.getElementById("excelbtnpolice").href = "policeexcelreport6";
        } else if (selection == 7) {
            document.getElementById("excelbtnpolice").href = "policeexcelreport7";
        } else if (selection == 8) {
            document.getElementById("excelbtnpolice").href = "policeexcelreport8";
        }
        return true;
    }
}

function exportpdfsuwasariya() {
    var selection = document.getElementById("suwasariyaoptions").value;
    if (selection != "select") {
        if (selection == 1) {
            document.getElementById("pdfbtnsuwasariya").href = "suwasariyapdfreport1";
        } else if (selection == 2) {
            document.getElementById("pdfbtnsuwasariya").href = "suwasariyapdfreport2";
        } else if (selection == 3) {
            document.getElementById("pdfbtnsuwasariya").href = "suwasariyapdfreport3";
        } else if (selection == 4) {
            document.getElementById("pdfbtnsuwasariya").href = "suwasariyapdfreport4";
        } else if (selection == 5) {
            document.getElementById("pdfbtnsuwasariya").href = "suwasariyapdfreport5";
        } else if (selection == 6) {
            document.getElementById("pdfbtnsuwasariya").href = "suwasariyapdfreport6";
        } else if (selection == 7) {
            document.getElementById("pdfbtnsuwasariya").href = "suwasariyapdfreport7";
        } else if (selection == 8) {
            document.getElementById("pdfbtnsuwasariya").href = "suwasariyapdfreport8";
        }
        return true;
    }
}

function exportexelsuwasariya() {
    var selection = document.getElementById("suwasariyaoptions").value;
    if (selection != "select") {
        if (selection == 1) {
            document.getElementById("excelbtnsuwasariya").href = "suwasariyaexcelreport1";
        } else if (selection == 2) {
            document.getElementById("excelbtnsuwasariya").href = "suwasariyaexcelreport2";
        } else if (selection == 3) {
            document.getElementById("excelbtnsuwasariya").href = "suwasariyaexcelreport3";
        } else if (selection == 4) {
            document.getElementById("excelbtnsuwasariya").href = "suwasariyaexcelreport4";
        } else if (selection == 5) {
            document.getElementById("excelbtnsuwasariya").href = "suwasariyaexcelreport5";
        } else if (selection == 6) {
            document.getElementById("excelbtnsuwasariya").href = "suwasariyaexcelreport6";
        } else if (selection == 7) {
            document.getElementById("excelbtnsuwasariya").href = "suwasariyaexcelreport7";
        } else if (selection == 8) {
            document.getElementById("excelbtnsuwasariya").href = "suwasariyaexcelreport8";
        }
        return true;
    }
}

function adminview() {
    document.getElementById('loader-wrapper2').style.display = "block";
    setTimeout(function() {
        document.getElementById("suwasariyadiv1").style.display = "none";
        document.getElementById("suwasariyadiv2").style.display = "none";
        document.getElementById("policediv1").style.display = "none";
        document.getElementById("policediv2").style.display = "none";
        document.getElementById("admindiv1").style.display = "block";
        document.getElementById("admindiv2").style.display = "block";
        document.getElementById("admin").classList.add("active");
        document.getElementById("suwasariya").classList.remove("active");
        document.getElementById("police").classList.remove("active");
        document.getElementById('loader-wrapper2').style.display = "none";
    }, 1000);
}

function policeview() {
    document.getElementById('loader-wrapper2').style.display = "block";
    setTimeout(function() {
        document.getElementById("suwasariyadiv1").style.display = "none";
        document.getElementById("suwasariyadiv2").style.display = "none";
        document.getElementById("admindiv1").style.display = "none";
        document.getElementById("admindiv2").style.display = "none";
        document.getElementById("policediv1").style.display = "block";
        document.getElementById("policediv2").style.display = "block";
        document.getElementById("police").classList.add("active");
        document.getElementById("admin").classList.remove("active");
        document.getElementById("suwasariya").classList.remove("active");
        document.getElementById('loader-wrapper2').style.display = "none";
    }, 1000);
}

function suwasariyaview() {
    document.getElementById('loader-wrapper2').style.display = "block";
    setTimeout(function() {
        document.getElementById("policediv1").style.display = "none";
        document.getElementById("policediv2").style.display = "none";
        document.getElementById("admindiv1").style.display = "none";
        document.getElementById("admindiv2").style.display = "none";
        document.getElementById("suwasariyadiv1").style.display = "block";
        document.getElementById("suwasariyadiv2").style.display = "block";
        document.getElementById("suwasariya").classList.add("active");
        document.getElementById("admin").classList.remove("active");
        document.getElementById("police").classList.remove("active");
        document.getElementById('loader-wrapper2').style.display = "none";
    }, 1000);
}