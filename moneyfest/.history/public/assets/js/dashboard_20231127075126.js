$(function () {

  //==========================================
  //==============1 TABEL BESAR===============
  //==========================================

  let pengeluaran = [];
  let pendapatan = [];
  let tanggal = [];

  axios.get("api/dashboard3/11-2022/1")
    .then(function (response) {
      response.data.forEach(function (item) {
        // alert(item);
        let date = item.tanggal;
        let category = item.kategori;
        let total = parseFloat(item.total);

        let existingIndex = tanggal.findIndex((entry) => entry.date === date);

        if (existingIndex === -1) {
          tanggal.push({ date: date, pengeluaran: 0, pendapatan: 0 });
          existingIndex = tanggal.length - 1;
        }

        if (category === 'pengeluaran') {
          tanggal[existingIndex].pengeluaran += total;
        } else if (category === 'pendapatan') {
          tanggal[existingIndex].pendapatan += total;
        }
      });

      alert('Pengeluaran:', pengeluaran);
      alert('Pendapatan:', pendapatan);
      alert('Tanggal:', tanggal);
    })
    .catch(function (error) {
      console.error('Error fetching data:', error);
    });

  axios.get('api/dashboard2')
    .then(function (response) {
      var selectDropdown = document.getElementById('month_select');

      // Loop through the API response and populate the dropdown
      response.data.forEach(function (item, index) {
        // Create an option element
        var option = document.createElement('option');

        // Set the value and text of the option
        option.value = item.value;  // Assuming your values start from 1
        option.text = item.tanggal;

        // Append the option to the select element
        selectDropdown.add(option);
      });
    })
    .catch(function (error) {
      console.error('Error fetching data:', error);
    });

  // =====================================
  // Main chart
  // =====================================
  var chart = {
    series: [
      { name: "Earnings this month:", data: [355, 390, 300, 350, 390, 180, 355, 390, 100, 240] },
      { name: "Expense this month:", data: [280, 250, 325, 215, 250, 310, 280, 250, 150, 300] },
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
      categories: ["16/08", "17/08", "18/08", "19/08", "20/08", "21/08", "22/08", "23/08", '24/08', '25/08'],
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
  let colors = ['#5D87FF', '#FF0000', '#808080', '#800080', '#FFFFFF'];
  var earning_colors = [];
  var expense_colors = [];

  //==========================================
  //==============2 TABEL KECIL===============
  //==========================================

  axios.get("api/dashboard")
    .then(function (response) {
      // Populate options
      response.data.forEach(function (item) {
        if (item.kategori == 'pendapatan') {
          earning_year.push(item.year);
          earning_value.push(Number(item.total));
          earning_colors.push(colors[earning_value.length - 1]);
        } else {
          expense_year.push(item.year);
          expense_value.push(Number(item.total));
          expense_colors.push(colors[expense_value.length - 1]);
        }
      });
      create_graph();
      change_text('income');
      change_text('expense');
    }
    )
    .catch(function (error) {
      console.error('Error fetching data:', error);
    });

  function change_text(part) {
    //change big text
    let number = 0
    if (part == 'income') {
      number = earning_value[earning_value.length - 1];
    } else if (part == 'expense') {
      number = expense_value[expense_value.length - 1];
    }

    let formattedNumber = new Intl.NumberFormat("id-ID", {
      style: "currency",
      currency: "IDR",
    }).format(number);

    value_id = part + '_value';
    document.getElementById(value_id).textContent = formattedNumber;

    if (part == 'income') {
      if (earning_value.length > 1) {
        var percentage = ((earning_value[earning_value.length - 1] - earning_value[earning_value.length - 2]) / earning_value[earning_value.length - 2] * 100).toFixed(1);
        percentage_string = percentage.toString();
      } else {
        var percentage_string = "-";
      }
    } else if (part == 'expense') {
      if (expense_value.length > 1) {
        var percentage = ((expense_value[expense_value.length - 1] - expense_value[expense_value.length - 2]) / expense_value[expense_value.length - 2] * 100).toFixed(1);
        percentage_string = percentage.toString();
      } else {
        var percentage_string = "-";
      }
    }

    //change logo
    logo_id = part + '_logo';
    var container = document.getElementById(logo_id);
    container.innerHTML = '';
    var spanElement = document.createElement("span");

    if (percentage > 0) {
      spanElement.className = "me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center";
      spanElement.innerHTML = '<i class="ti ti-arrow-up-left text-success"></i>';
      percentage_string = '+' + percentage_string;
    } else if (percentage < 0) {
      spanElement.className = "me-1 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center";
      spanElement.innerHTML = '<i class="ti ti-arrow-down-left text-danger"></i>';
    }
    container.appendChild(spanElement);

    var percentage_id = part + '_percentage';
    var incomePercentageElement = document.createElement("p");
    incomePercentageElement.id = percentage_id;
    incomePercentageElement.className = "text-dark me-1 fs-3 mb-0";

    var lastYearElement = document.createElement("p");
    lastYearElement.className = "fs-3 mb-0";
    lastYearElement.textContent = "last year";

    container.appendChild(incomePercentageElement);
    container.appendChild(lastYearElement);

    //change percent
    percentage_string += '%';
    document.getElementById(percentage_id).textContent = percentage_string;

    //change years
    year_id = part + '_year';
    var containerDiv = document.getElementById(year_id);
    if (part == 'expense') {
      var i = 0;
      expense_colors.forEach(function (item) {
        var newDiv = document.createElement("div");
        newDiv.className = "me-4";

        var newSpan = document.createElement("span");
        newSpan.className = "round-8 rounded-circle me-2 d-inline-block";
        newSpan.style.backgroundColor = item;

        newDiv.appendChild(newSpan);

        var newtext = document.createElement('span');
        newtext.className = 'fs-2';
        newtext.textContent = expense_year[i];
        // Append the provided HTML snippet to the new div
        newDiv.appendChild(newtext);

        containerDiv.appendChild(newDiv);
        i++;
      });
    } else if (part == 'income') {
      var i = 0;
      earning_colors.forEach(function (item) {
        var newDiv = document.createElement("div");
        newDiv.className = "me-4";

        var newSpan = document.createElement("span");
        newSpan.className = "round-8 rounded-circle me-2 d-inline-block";
        newSpan.style.backgroundColor = item;

        newDiv.appendChild(newSpan);

        var newtext = document.createElement('span');
        newtext.className = 'fs-2';
        newtext.textContent = earning_year[i];
        // Append the provided HTML snippet to the new div
        newDiv.appendChild(newtext);

        containerDiv.appendChild(newDiv);
        i++;
      });
    }


  }
  function create_graph() {
    // alert(earning_value);

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
