fetch('data_posi.php')
  .then(response => response.json())
  .then(data => {
    var ctxedu = document.getElementById('PiePosition').getContext('2d');

    var backgroundColors = [
      "#1f77b4", "#ff7f0e", "#2ca02c", "#d62728", "#9467bd"
    ];
    
    var PiePosition = new Chart(ctxedu, {
      type: 'pie',
      data: {
        labels: data.data_posi_name,
        datasets: [{
          data: data.data_posi_count,
          backgroundColor: backgroundColors,
          borderWidth: 1,
        }],
      },
    });
  });