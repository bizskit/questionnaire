fetch('data_work_type.php')
  .then(response => response.json())
  .then(data => {
    var ctxwt = document.getElementById('PieWorkType').getContext('2d');

    var backgroundColors = [
      "#1abc9c", "#e67e22", "#f39c12", "#d35400", "#34495e"
    ];
    
    
    var PieWorkType = new Chart(ctxwt, {
      type: 'pie',
      data: {
        labels: data.data_wt_name,
        datasets: [{
          data: data.data_wt_count,
          backgroundColor: backgroundColors,
          borderWidth: 1,
        }],
      },
    });
  });