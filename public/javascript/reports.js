google.charts.load('current', { 'packages': ['corechart'] });
google.charts.setOnLoadCallback(drawVisualization);

function drawVisualization() {
    // Some raw data (not necessarily accurate)
    var data = google.visualization.arrayToDataTable([
        ['Month', 'Rejected 119 Requests', 'Accepted 119 Requests', 'Rejected 1990 Requests', 'Accepted 1990 Requests', 'Total Requests'],
        ['June', 100, 938, 23, 998, 2059],
        ['July', 045, 1120, 87, 1268, 2520],
        ['August', 98, 1167, 34, 807, 2106],
        ['September', 113, 1110, 123, 968, 2314],
        ['October', 35, 691, 94, 1146, 1966]
    ]);

    var options = {
        title: 'Monthly Service Statics',
        vAxis: { title: 'Requests' },
        hAxis: { title: 'Month' },
        seriesType: 'bars',
        series: { 4: { type: 'line' } }
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}

google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    var data = google.visualization.arrayToDataTable([
        ['User Category', 'User Requests'],
        ['Unverified users', 2245],
        ['Blocked Users', 1134],
        ['Rejected Users', 998],
        ['Verified Users', 55690],
    ]);

    var options = {
        title: 'User Satatics'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
}