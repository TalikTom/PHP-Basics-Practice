Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Practicing Mysql'
    },
    xAxis: {
        categories: [
            'Practice_1',
            'Practice_2',
            'Practice_3',
            'Practice_4',
            'Practice_5',
            'Practice_6',
            'Practice_7',
            'Practice_8'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Minutes'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} minutes</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Create and alter table - time',
        data: [15.58, 11.38, 10.55, 11.22, 7.42, 8.29, 9.24, 8.20]

    }, {
        name: 'Practice Mysql assignments - time',
        data: [34.43, 24.31, 18.57, 16.32, 13.10, 12.30, 14.13, 8.55]

    }, {
        name: 'Total - time',
        data: [50.40, 36.09, 29.53, 27.54, 20.52, 20.59, 23.37, 17.15]

    },]
});

function copyText() {
    let copyText = document.getElementById("textbox");
    copyText.select();
    document.execCommand("copy");
    document.getElementById("message")
        .innerHTML = "Copied the text!"
}


function copyEvent(id) {
    let str = document.getElementById(id);
    window.getSelection().selectAllChildren(str);
    document.execCommand("Copy")
}


function toggle() {
    let element = document.getElementById("nav");
    element.classList.toggle("hide");
}