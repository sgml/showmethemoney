<?php
function lookup($locale, $num)
  {

$doc = new DOMDocument;

$doc->LoadHTML('<html><head><meta content="text/html;charset=utf-8" http-equiv="Content-Type"><link href="ux.css" type="text/css" rel="stylesheet"></head><body><div id="container"><object><div class="donate_btn"><span id="_10" lang="usd">$10</span></div></object><object><div class="donate_btn"><span id="_25" lang="usd">$25</span></div></object><object><div class="donate_btn"><span id="_50" lang="usd">$50</span></div></object><object><div class="donate_btn"><span id="_100" lang="usd">$100</span></div></object><span class="wedge"></span></div><h2>
      Change Currency:
	  </h2><dl id="fiats"><dt><a href="#_USD">United States Dollar</a></dt><dt><a href="#_JPY">Japanese Yen</a></dt><dt><a href="#_BGN">Bulgarian Lev</a></dt><dt><a href="#_CZK">Czech Koruna</a></dt><dt><a href="#_ARS">Argentine Peso</a></dt><dt><a href="#_AUD">Australian Dollar</a></dt><dt><a href="#_CHF">Swiss Franc</a></dt></dl><input value="0.013125" id="JPY" type="hidden"><input value="¥" id="lang_JPY" type="hidden"><input value="0.6707" id="BGN" type="hidden"><input value="лв" id="lang_BGN" type="hidden"><input value="0.05190" id="CZK" type="hidden"><input value="Kč" id="lang_CZK" type="hidden"><input value="0.2294" id="ARS" type="hidden"><input value="₱" id="lang_ARS" type="hidden"><input value="1.0689" id="AUD" type="hidden"><input value="$" id="lang_AUD" type="hidden"><input value="1.1154" id="CHF" type="hidden"><input value="₣" id="lang_CHF" type="hidden"><input value="1" id="USD" type="hidden"><input value="$" id="lang_USD" type="hidden"><script type="application/javascript" src="ux.js"></script></body></html>');

$xpath = new DOMXPath($doc);
$xpath->registerNameSpace('html', 'http://www.w3.org/1999/xhtml');

$query = $xpath->query("//input[@id='$locale']/@value");

$multiplier = $query->item(0)->nodeValue;

$value = $num * $multiplier;

return array($locale,$value);
}
?>
