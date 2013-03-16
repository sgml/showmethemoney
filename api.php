<?php
$dir = dirname( __FILE__ );
require("$dir/CurrencyConverter.php"); 

  $forex = new CurrencyConverter();
  $forex.getRates('http://toolserver.org/~kaldari/rates.xml');
?>
