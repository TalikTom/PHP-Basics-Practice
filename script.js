const chart = Highcharts.chart("container", {
    credits: {
        enabled: false,
    },
    title: {
        text: "Vrijeme izrade baza i tablica, 2022",
        align: "left",
    },
    subtitle: {
        text: "Chart option: Plain",
        align: "left",
    },
    xAxis: {
        categories: [
            "Vjezba_1",
            "Vjezba_2",
            "Vjezba_3",
            "Vjezba_4",
            "Vjezba_5",
            "Vjezba_6",
            "Vjezba_7",
            "Vjezba_8",
        ],
    },
    yAxis: {
        title: {
            text: "Time",
        },
    },
    series: [
        {
            type: "column",
            name: "Unemployed",
            colorByPoint: true,
            data: [50.4, 36.09, 29.53, 27.54, 20.52, 20.59, 23.37, 17.15],
            showInLegend: false,
        },
    ],
});

document.getElementById("plain").addEventListener("click", () => {
    chart.update({
        chart: {
            inverted: false,
            polar: false,
        },
        subtitle: {
            text: "Chart option: Plain",
        },
    });
});

document.getElementById("inverted").addEventListener("click", () => {
    chart.update({
        chart: {
            inverted: true,
            polar: false,
        },
        subtitle: {
            text: "Chart option: Inverted",
        },
    });
});

document.getElementById("polar").addEventListener("click", () => {
    chart.update({
        chart: {
            inverted: false,
            polar: true,
        },
        subtitle: {
            text: "Chart option: Polar",
        },
    });
});
