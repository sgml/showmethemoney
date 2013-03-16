<?php
function convert($data)
  {
  $num = filter_var($data, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION)
  $locale = rtrim(str_replace($num, "", $value)); 
  lookup($locale, $num);
  }
?>
