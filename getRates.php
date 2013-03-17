function getRates($service)
  {
  $dir = dirname( __FILE__ );
  $rates_file = "$dir/rates.xml";
  $rates = file_get_contents($service);
  file_put_contents($rates_file, $rates);
  // TODO: Validate XML content type and load into table 
  /*
  $xml = "LOAD XML LOCAL INFILE '/tmp/rates.xml' INTO TABLE ('forex') ROWS IDENTIFIED BY '<conversion>';
  mysql_query($xml);
  */
  //parseData();
  }

getRates('http://toolserver.org/~kaldari/rates.xml');
