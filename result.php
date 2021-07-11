<?php
  $sum = trim($_POST['sum']);
  $sum = str_replace("," , "." , $sum);
  $percentVat = 0.2;
  $percentTax = 0.01;
  if ($sum == '') {
    echo 'false';
    exit();
  }
  elseif(is_numeric($sum)){
    $myObj->sum_without = $sum / (1 + $percentVat + $percentTax);
    $myObj->tax = $myObj->sum_without * $percentTax;
    $myObj->vat = $myObj->sum_without * $percentVat;
    $mySumJSON = json_encode($myObj);
    echo $mySumJSON;
  }
  else {
    echo 'nonum';
  }

?>
