fetch('data_num_year.php')
  .then(response => response.json())
  .then(data => {
    var ctxny = document.getElementById('PieNumYear').getContext('2d');

    var backgroundColors = [
      "#3498db", "#e74c3c", "#2ecc71", "#f1c40f", "#9b59b6"
    ];
    
    var PieNumYear = new Chart(ctxny, {
      type: 'pie',
      data: {
        labels: data.data_ny_name,
        datasets: [{
          data: data.data_ny_count,
          backgroundColor: backgroundColors,
          borderWidth: 1,
        }],
      },
    });
  });