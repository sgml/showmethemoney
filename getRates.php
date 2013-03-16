<?php
function getRates($service)
  {
  $rates_file = '/tmp/rates.xml';
  $this->rates = file_get_contents($service);
  file_put_contents($rates_file, $this->rates);
  // TODO: Validate XML content type and load into table 
  /*
  $xml = "LOAD XML LOCAL INFILE '/tmp/rates.xml' INTO TABLE ('forex') ROWS IDENTIFIED BY '<conversion>';
  mysql_query($xml);
  */
  parseData();
  }
?>
