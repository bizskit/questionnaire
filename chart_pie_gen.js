fetch('data_gen.php')
  .then(response => response.json())
  .then(data => {
    var ctxgen = document.getElementById('PieGen').getContext('2d');

    var backgroundColors = [
      "#e63946", "#457b9d", "#2a9d8f", "#e9c46a", "#264653"
    ];
    
    var PieGen = new Chart(ctxgen, {
      type: 'pie',
      data: {
        labels: data.data_gen_name,
        datasets: [{
          data: data.data_gen_count,
          backgroundColor: backgroundColors,
          borderWidth: 1,
        }],
      },
    });
  });