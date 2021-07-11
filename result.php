<?php
  $sum = trim($_POST['sum']);
  $sum = str_replace("," , "." , $sum);
  
  if ($sum == '') {
    echo 'false';
    exit();
  }
  elseif(is_numeric($sum)){
    $myObj->vat = ($sum) * 0.2;
    $myObj->tax = ($sum - $myObj->vat) * 0.01;
    $myObj->sum_without = $sum - $myObj->vat - $myObj->tax;
    $mySumJSON = json_encode($myObj);
    echo $mySumJSON;
  }
  else {
    echo 'nonum';
  }

?>
