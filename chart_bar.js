fetch('data_avg_section.php')
  .then(response => response.json())
  .then(data => {
    // Format the data to 2 decimal places
    const formattedData = data.data_section_avg.map(value => parseFloat(value).toFixed(2));

    var ctxavg = document.getElementById('BarAvgSection').getContext('2d');

    var backgroundColors = [
      "#4a90e2", "#50e3c2", "#f5a623", "#d0021b", "#7ed321",
      "#9013fe", "#f8e71c", "#b8e986", "#417505", "#bd10e0",
      "#4a4a4a", "#9b9b9b", "#e67e22", "#2ecc71", "#f39c12",
      "#c0392b", "#8e44ad", "#2980b9", "#27ae60", "#e74c3c",
    ];
    
    var BarAvgSection = new Chart(ctxavg, {
      type: 'bar',
      data: {
        labels: data.data_section_name,
        datasets: [{
          data: formattedData,
          backgroundColor: backgroundColors,
          borderWidth: 1,
        }],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              callback: function(value) {
                return value.toFixed(2); // Display y-axis values with 2 decimal places
              }
            }
          }
        },
        plugins: {
          legend: {
            display: false
          }
        }
      },
    });
  });
