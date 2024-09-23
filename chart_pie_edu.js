fetch('data_education.php')
  .then(response => response.json())
  .then(data => {
    var ctxedu = document.getElementById('PieEducation').getContext('2d');

    var backgroundColors = [
      "#ff6f61", "#6b5b95", "#88b04b", "#f7cac9", "#92a8d1",
      "#955251", "#b565a7", "#009688", "#dd4124", "#45b8ac"
    ];
    
    var PieEducation = new Chart(ctxedu, {
      type: 'pie',
      data: {
        labels: data.data_edu_name,
        datasets: [{
          data: data.data_edu_count,
          backgroundColor: backgroundColors,
          borderWidth: 1,
        }],
      },
    });
  });