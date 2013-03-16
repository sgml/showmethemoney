<?php
function getRates($service)
  {
  $rates_file = '/tmp/rates.xml';
  $this->rates = file_get_contents($service);
  file_put_contents($rates_file, $rates);
  LOAD XML LOCAL INFILE '/tmp/rates.xml' INTO TABLE forex ROWS IDENTIFIED BY '<conversion>';
  parseData();
  }
?>
