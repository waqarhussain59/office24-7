!(function (d) {
    "use strict";
    d(function () {
     
        if (d("#barChart").length) {
            var a = d("#barChart").get(0).getContext("2d");
            new Chart(a, {
                type: "bar",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [
                        { label: "Graana", data: [46, 57, 59, 54, 62, 58, 64, 60, 66.65, 85, 75], backgroundColor: "#351c75" },
                        { label: "Propsure", data: [74, 83, 102, 97, 86, 106, 93, 114, 94, 85, 96, 78], backgroundColor: "#cd161f" },
                        { label: "Imarat", data: [37, 42, 38, 26, 47, 50, 54, 55, 43, 67, 85, 65], backgroundColor: "#c1a5c7" },
                        { label: "Agency21", data: [46, 57, 59, 54, 62, 58, 64, 60, 66, 45, 66, 75], backgroundColor: "#4a9462" },
                    ]},
                options: {
                    responsive: !0,
                    maintainAspectRatio: !0,
                    scales: {
                        yAxes: [{ display: !1, gridLines: { drawBorder: !1 }, ticks: { fontColor: "#686868" } }],
                        xAxes: [{ barPercentage: 0.7, categoryPercentage: 0.5, ticks: { fontColor: "#7b919e" }, gridLines: { display: !1, drawBorder: !1 } }],
                    },
                    elements: { point: { radius: 0 } },
                },
            });
        }
           // if (((Chart.defaults.global.defaultFontColor = "#7b919e"), (Chart.defaults.scale.gridLines.color = "rgba(123, 145, 158,185,0.1)"), d("#lineChart").length)) {
        //     var e = d("#lineChart").get(0).getContext("2d");
        //     new Chart(e, {
        //         type: "line",
        //         data: {
        //             labels: ["2018", "2019","2020","2021","2022"],
        //             datasets: [
        //                 // { label: "Porpsure", data: [120, 180, 140, 210, 160, 240, 180, 210, 200, 150, 250], borderColor: ["#3ddc97"], borderWidth: 3, fill: !1, pointBackgroundColor: "#ffffff", pointBorderColor: "#3ddc97" },
        //                 // { label: "Imarat", data: [80, 140, 100, 170, 120, 200, 140, 170, 170, 200, 175], borderColor: ["#7c8a96"], borderWidth: 3, fill: !1, pointBackgroundColor: "#ffffff", pointBorderColor: "#7c8a96" },
        //             ],
        //         },
        //         options: {
        //             scales: { yAxes: [{ gridLines: { drawBorder: !1, borderDash: [3, 3], zeroLineColor: "#7b919e" }, ticks: { min: 0, color: "#7b919e" } }], xAxes: [{ gridLines: { display: !1, drawBorder: !1, color: "#ffffff" } }] },
        //             elements: { line: { tension: 0.2 }, point: { radius: 4 } },
        //             stepsize: 1,
        //         },
        //     });
        // }
        // if (d("#areaChart").length) {
        //     var r = d("#areaChart").get(0).getContext("2d");
        //     new Chart(r, {
        //         type: "line",
        //         data: {
        //             labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        //             datasets: [
        //                 { data: [22, 23, 28, 20, 27, 20, 20, 24, 10, 35, 20, 25], backgroundColor: ["#3ddc97"], borderColor: ["#3ddc97"], borderWidth: 2, fill: "origin", label: "Upcube" },
        //                 { data: [50, 40, 48, 70, 50, 63, 63, 42, 42, 51, 35, 35], backgroundColor: ["rgba(0, 167, 225, 0.3)"], borderColor: ["#00a7e1"], borderWidth: 1, fill: "origin", label: "Zinzer" },
        //                 { data: [95, 75, 90, 105, 95, 95, 95, 100, 75, 95, 90, 105], backgroundColor: ["rgba(223, 227, 233, 0.2)"], borderColor: ["#dfe3e9"], borderWidth: 1, fill: "origin", label: "Drixo" },
        //             ],
        //         },
        //         options: {
        //             responsive: !0,
        //             maintainAspectRatio: !0,
        //             plugins: { filler: { propagate: !1 } },
        //             scales: { xAxes: [{ gridLines: { display: !1, drawBorder: !1, color: "transparent", zeroLineColor: "#eeeeee" } }], yAxes: [{ gridLines: { drawBorder: !1, borderDash: [3, 3] } }] },
        //             legend: { display: !1 },
        //             tooltips: { enabled: !0 },
        //             elements: { line: { tension: 0 }, point: { radius: 0 } },
        //         },
        //     });
        // }
        // if ((areaChart, d("#pieChart").length)) {
        //     var o = d("#pieChart").get(0).getContext("2d");
        //     new Chart(o, {
        //         type: "pie",
        //         data: { datasets: [{ data: [21, 16, 48, 31], backgroundColor: ["#3ddc97", "#3051d3", "#00a7e1", "#e4cc37"], borderColor: ["#3ddc97", "#3051d3", "#00a7e1", "#e4cc37"] }], labels: ["Drixo", "Upcube", "Vakavia", "Devazo"] },
        //         options: { responsive: !0, animation: { animateScale: !0, animateRotate: !0 } },
        //     });
        // }
        // if (d("#donut-chart").length)
        //     (o = d("#donut-chart").get(0).getContext("2d")),
        //         new Chart(o, {
        //             type: "pie",
        //             data: {
        //                 datasets: [{ data: [21, 16, 48, 31], backgroundColor: ["#3051d3", "#00a7e1", "#3ddc97", "#e4cc37"], borderColor: ["#3051d3", "#00a7e1", "#3ddc97", "#e4cc37"] }],
        //                 labels: ["Drixo", "Upcube", "Vakavia", "Devazo"],
        //             },
        //             options: { responsive: !0, cutoutPercentage: 70, animation: { animateScale: !0, animateRotate: !0 } },
        //         });
        // if (d("#radar-chart").length) {
        //     var t = d("#radar-chart").get(0).getContext("2d");
        //     new Chart(t, {
        //         type: "radar",
        //         data: {
        //             datasets: [
        //                 {
        //                     label: "Unhealthy",
        //                     backgroundColor: "rgba(223, 227, 233, 0.2)",
        //                     borderColor: "#dfe3e9",
        //                     borderWidth: 1,
        //                     pointBackgroundColor: "#dfe3e9",
        //                     pointBorderColor: "#fff",
        //                     pointHoverBackgroundColor: "#fff",
        //                     pointHoverBorderColor: "#dfe3e9",
        //                     data: [65, 59, 90, 81, 56, 55, 40],
        //                 },
        //                 {
        //                     label: "Healthy",
        //                     backgroundColor: "rgba(48, 81, 211, 0.2)",
        //                     borderColor: "#3051d3",
        //                     borderWidth: 1,
        //                     pointBackgroundColor: "#3051d3",
        //                     pointBorderColor: "#fff",
        //                     pointHoverBackgroundColor: "#fff",
        //                     pointHoverBorderColor: "#3051d3",
        //                     data: [28, 48, 40, 19, 96, 27, 100],
        //                 },
        //             ],
        //             labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
        //         },
        //         options: { responsive: !0, cutoutPercentage: 70, animation: { animateScale: !0, animateRotate: !0 } },
        //     });
        // }
    });
})(jQuery);
