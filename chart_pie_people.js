
fetch('data_amount_people.php')
  .then(response => response.json())
  .then(data => {
    var ctxpeo = document.getElementById('PieAmountPeople').getContext('2d');

    var PieAmountPeople = new Chart(ctxpeo, {
      type: 'pie',
      data: {
        labels: data.happiness_levels,
        datasets: [{
          data: data.happiness_count,
          backgroundColor: ['#dd1818', '#f37335', '#fdc830','#09c860'],
          borderWidth: 1,
        }],
      },
    });
  });