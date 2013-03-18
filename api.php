<?php
$dir = dirname( __FILE__ );
require("$dir/CurrencyConverter.php"); 

  $forex = new CurrencyConverter('http://toolserver.org/~kaldari/rates.xml');
  $forex->getRates();
?>
