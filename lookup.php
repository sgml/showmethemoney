<?php
function lookup($locale, $num)

$doc = new DOMDocument;

$doc->LoadXML($this->rates');

$xpath = new DOMXPath($doc);

$query = "//" . $locale;

$multiplier = $xpath->query($query);

$value = $num * $multiplier;
?>
