(function ($) {
  'use strict';
  
  $(function () {
    var successColor = getComputedStyle(document.body).getPropertyValue('--success');
    var warningColor = getComputedStyle(document.body).getPropertyValue('--warning');
    var infoColor = getComputedStyle(document.body).getPropertyValue('--info');

    if ($('#product-sales-chart').length) {
      var lineChartCanvas = $("#product-sales-chart").get(0).getContext("2d");
      var gradientStrokeFill_1 = lineChartCanvas.createLinearGradient(0, 0, 0, 460);
      gradientStrokeFill_1.addColorStop(1, 'rgba(255, 255, 255, 0.0)');
      gradientStrokeFill_1.addColorStop(0, 'rgba(102, 78, 235, 0.2)');
      var gradientStrokeFill_2 = lineChartCanvas.createLinearGradient(0, 0, 0, 430);
      gradientStrokeFill_2.addColorStop(1, 'rgba(255, 255, 255, 0.0)');
      gradientStrokeFill_2.addColorStop(0, '#14c671');
      var gradientStrokeFill_3 = lineChartCanvas.createLinearGradient(0, 0, 0, 400);
      gradientStrokeFill_3.addColorStop(1, 'rgba(255, 255, 255, 0.0)');
      gradientStrokeFill_3.addColorStop(0, '#ffaf00');
      var areaData = {
        labels: ["Jan 1", "Jan 7", "Jan 14", "Jan 21", "Jan 28", "Feb 4", "Feb 11", "Feb 18"],
        datasets: [{
          label: 'TCP Reset Packets',
          data: [60, 75, 65, 130, 130, 145, 110, 145, 155, 149, 170],
          borderColor: infoColor,
          backgroundColor: gradientStrokeFill_1,
          borderWidth: 2
        }, {
          label: 'TCP FIN Packets',
          data: [0, 25, 20, 40, 70, 52, 49, 90, 70, 94, 110, 135],
          borderColor: successColor,
          backgroundColor: gradientStrokeFill_2,
          borderWidth: 2
        }, {
          label: 'TCP Out Packets',
          data: [40, 45, 60, 50, 76, 70, 60, 99, 75, 96, 130, 205],
          borderColor: warningColor,
          backgroundColor: gradientStrokeFill_3,
          borderWidth: 2
        }]
      };
      var areaOptions = {
        responsive: true,
        animation: {
          animateScale: true,
          animateRotate: true
        },
        elements: {
          point: {
            radius: 3,
            backgroundColor: "#fff"
          },
          line: {
            tension: 0
          }
        },
        layout: {
          padding: {
            left: 0,
            right: 0,
            top: 0,
            bottom: 0
          }
        },
        legend: false,
        scales: {
          xAxes: [{
            ticks: {
              fontColor: "#858585",
              beginAtZero: true

            },
            gridLines: {
              color: '#fff',
              display: true,
              drawBorder: false
            }
          }],
          yAxes: [{
            ticks: {
              max: 200,
              min: 0,
              stepSize: 50,
              fontColor: "#858585",
              beginAtZero: false
            },
            gridLines: {
              color: '#e2e6ec',
              display: true,
              drawBorder: false
            }
          }]
        }
      }
      var revenueChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: areaData,
        options: areaOptions
      });
    }
  });
})(jQuery)
