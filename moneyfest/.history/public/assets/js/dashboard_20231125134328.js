$(function () {


  // =====================================
  // Main chart
  // =====================================
  var chart = {
    series: [
      { name: "Earnings this month:", data: [355, 390, 300, 350, 390, 180, 355, 390] },
      { name: "Expense this month:", data: [280, 250, 325, 215, 250, 310, 280, 250] },
    ],

    chart: {
      type: "bar",
      height: 345,
      offsetX: -15,
      toolbar: { show: true },
      foreColor: "#adb0bb",
      fontFamily: 'inherit',
      sparkline: { enabled: false },
    },


    colors: ["#5D87FF", "#49BEFF"],


    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: "35%",
        borderRadius: [6],
        borderRadiusApplication: 'end',
        borderRadiusWhenStacked: 'all'
      },
    },
    markers: { size: 0 },

    dataLabels: {
      enabled: false,
    },


    legend: {
      show: false,
    },


    grid: {
      borderColor: "rgba(0,0,0,0.1)",
      strokeDashArray: 3,
      xaxis: {
        lines: {
          show: false,
        },
      },
    },

    xaxis: {
      type: "category",
      categories: ["16/08", "17/08", "18/08", "19/08", "20/08", "21/08", "22/08", "23/08"],
      labels: {
        style: { cssClass: "grey--text lighten-2--text fill-color" },
      },
    },


    yaxis: {
      show: true,
      min: 0,
      max: 400,
      tickAmount: 4,
      labels: {
        style: {
          cssClass: "grey--text lighten-2--text fill-color",
        },
      },
    },
    stroke: {
      show: true,
      width: 3,
      lineCap: "butt",
      colors: ["transparent"],
    },


    tooltip: { theme: "light" },

    responsive: [
      {
        breakpoint: 600,
        options: {
          plotOptions: {
            bar: {
              borderRadius: 3,
            }
          },
        }
      }
    ]


  };

  var chart = new ApexCharts(document.querySelector("#chart"), chart);
  chart.render();





  var earning_year = [];
  var earning_value = [];
  var expense_year = [];
  var expense_value = [];
  let colors = ['#0000FF', '#FF0000', '#808080', '#800080', '#FFFFFF'];
  var earning_colors = [];
  var expense_colors = []

  axios.get("api/dashboard")
    .then(function (response) {
      // Populate options
      response.data.forEach(function (item) {
        alert(item.kategori);
        if (item.kategori == 'pendapatan') {
          earning_year.push(item.year);
          earning_value.push(item.total);
          earning_colors.push(colors[earning_value.length - 1]);
        } else {
          expense_year.push(item.year);
          expense_value.push(item.total);
          expense_colors.push(colors[expense_value.length - 1]);
        }
      });
      create_graph();
    }
    )
    .catch(function (error) {
      console.error('Error fetching data:', error);
    });

  function create_graph() {
    // =====================================
    // Grafik earning
    // =====================================
    // alert(earning_value);
    var breakup = {
      color: "#adb5bd",
      series: earning_value,
      labels: earning_year,
      chart: {
        width: 180,
        type: "donut",
        fontFamily: "Plus Jakarta Sans', sans-serif",
        foreColor: "#adb0bb",
      },
      plotOptions: {
        pie: {
          startAngle: 0,
          endAngle: 360,
          donut: {
            size: '75%',
          },
        },
      },
      stroke: {
        show: false,
      },

      dataLabels: {
        enabled: false,
      },

      legend: {
        show: false,
      },
      colors: earning_colors,

      responsive: [
        {
          breakpoint: 991,
          options: {
            chart: {
              width: 150,
            },
          },
        },
      ],
      tooltip: {
        theme: "dark",
        fillSeriesColor: false,
      },
    };

    var chart = new ApexCharts(document.querySelector("#breakup"), breakup);
    chart.render();


    // =====================================
    // Grafik Expenses
    // =====================================

    var breakups = {
      color: "#f05948",
      series: expense_value,
      labels: expense_year,
      chart: {
        width: 180,
        type: "donut",
        fontFamily: "Plus Jakarta Sans', sans-serif",
        foreColor: "#f05948",
      },
      plotOptions: {
        pie: {
          startAngle: 0,
          endAngle: 360,
          donut: {
            size: '75%',
          },
        },
      },
      stroke: {
        show: false,
      },

      dataLabels: {
        enabled: false,
      },

      legend: {
        show: false,
      },
      colors: expense_colors,

      responsive: [
        {
          breakpoint: 991,
          options: {
            chart: {
              width: 150,
            },
          },
        },
      ],
      tooltip: {
        theme: "dark",
        fillSeriesColor: false,
      },
    };

    var chart = new ApexCharts(document.querySelector("#breakups"), breakups);
    chart.render();
  }
})
