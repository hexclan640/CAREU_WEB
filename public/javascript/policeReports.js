$(document).ready(function() {
    $.ajax({
        url: 'flagcount',
        method: 'post',
        success: function(data) {
            var dataset = data.split(" ");
            var count = parseInt(dataset[0]) + parseInt(dataset[1]) + parseInt(dataset[2]) + parseInt(dataset[3]);
            document.getElementById("title1").innerHTML = "Total Requests - " + count;
            var ctx = document.getElementById('myChart1').getContext('2d');
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
        url: 'categorycount',
        method: 'post',
        success: function(data) {
            var dataset = data.split(" ");
            var ctx = document.getElementById('myChart2').getContext('2d');
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
        url: 'districtcount',
        method: 'post',
        success: function(data) {
            var dataset = data.split(" ");
            var ctx = document.getElementById('myChart3').getContext('2d');
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

// function exportpdf() {
//     if (document.getElementById("options").value != "select") {
//         document.getElementById("pdfbtn").href = document.getElementById("options").value;
//         return true;
//     }
// }

function exportpdf() {
    var selection = document.getElementById("options").value;
    if (selection != "select") {
        if (selection == 1) {
            document.getElementById("pdfbtn").href = "pdfreport1";
        } else if (selection == 2) {
            document.getElementById("pdfbtn").href = "pdfreport2";
        } else if (selection == 3) {
            document.getElementById("pdfbtn").href = "pdfreport3";
        } else if (selection == 4) {
            document.getElementById("pdfbtn").href = "pdfreport4";
        } else if (selection == 5) {
            document.getElementById("pdfbtn").href = "pdfreport5";
        } else if (selection == 6) {
            document.getElementById("pdfbtn").href = "pdfreport6";
        } else if (selection == 7) {
            document.getElementById("pdfbtn").href = "pdfreport7";
        } else if (selection == 8) {
            document.getElementById("pdfbtn").href = "pdfreport8";
        }
        return true;
    }
}

function exportexel() {
    var selection = document.getElementById("options").value;
    if (selection != "select") {
        if (selection == 1) {
            document.getElementById("excelbtn").href = "cxcelreport1";
        } else if (selection == 2) {
            document.getElementById("excelbtn").href = "cxcelreport2";
        } else if (selection == 3) {
            document.getElementById("excelbtn").href = "cxcelreport3";
        } else if (selection == 4) {
            document.getElementById("excelbtn").href = "cxcelreport4";
        } else if (selection == 5) {
            document.getElementById("excelbtn").href = "cxcelreport5";
        } else if (selection == 6) {
            document.getElementById("excelbtn").href = "cxcelreport6";
        } else if (selection == 7) {
            document.getElementById("excelbtn").href = "cxcelreport7";
        } else if (selection == 8) {
            document.getElementById("excelbtn").href = "cxcelreport8";
        }
        return true;
    }
}