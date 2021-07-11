
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Test</title>
</head>
<body>
<div class="container">
  <div class="col-7 mt-3">
    <form action="" method="post">
      <label for="sum">Введите сумму</label>
      <input type="text" name="sum" id="sum" class="form-control">

      <div class="alert alert-danger mt-2" id="error"></div>
      
      <button type="button" id="result_sum" class="btn btn-success mt-3">
        Рассчитать
      </button>
    </form>
  </div>
  <div class="col-12 mt-5" id="resultBlock">
    <h5>Размер НДС - <span id="vat"><</span> руб.</h5>
    <h5>Размер курортного сбора - <span id="tax"></span> руб.</h5>
    <h5>Стоимость путевки без НДС и курортного сбора - <span id="sum_without"></span> руб.</h5>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $('#result_sum').click(function() {
    var sum = $('#sum').val()
    $.ajax({
        url: 'result.php',
        type: 'POST',
        cache: false,
        data: {'sum': sum}, 
        dataType: 'html',
        success: function(data) {
          if(data == 'false') {
            $('#error').show(); 
            $('#error').text('Введите сумму путевки для расчета НДС и курортного налога'); 
            $('#resultBlock').hide(); 
          }
          else if(data == 'nonum'){
            $('#error').show(); 
            $('#error').text('Введите число! Например, 1200');
            $('#resultBlock').hide(); 
          }
          else {
            var sum = JSON.parse(data);
            $('#error').hide();
            $('#vat').text(sum.vat.toFixed(2));
            $('#tax').text(sum.tax.toFixed(2));
            $('#sum_without').text(sum.sum_without.toFixed(2));
            $('#resultBlock').show();
          }
        }
    });
  });
</script>

</body>
</html>