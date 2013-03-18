<?php
class CurrencyConverter 
  {
  
  public $service;
  public $stylesheet;
  public $markup;  

  public function __construct( $service ) 
    {
    $this->service = $service;
    $this->stylesheet = 'convert.xsl';
    }

  public function convert($data)
    {
    $num = filter_var($data, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $locale = rtrim(str_replace($num, "", $data)); 
    return $this->lookup($locale, $num);
    }

  public function parseData($rates)
    {
    $xml = new DOMDocument;
    $xml->loadXML($rates);

    $xsl = new DOMDocument;
    $xsl->load($this->stylesheet);

    $proc = new XSLTProcessor;
    $proc->importStyleSheet($xsl);
    $dir = dirname( __FILE__ );
    $html = "$dir/CurrencyConverter.html";

    $this->markup = $proc->transformToXML($xml);
    file_put_contents($html, $this->markup);
    }

  public function getRates()
    {
    $dir = dirname( __FILE__ );
    $currency = "$dir/currency.xml";
    $rates = file_get_contents($this->service);
    file_put_contents($currency, $rates);
    // TODO: Validate XML content type and load into table 
    /*
    $xml = "LOAD XML LOCAL INFILE $currency INTO TABLE ('forex') ROWS IDENTIFIED BY '<conversion>';
    mysql_query($xml);
    */
    $this->parseData($rates);
    }

  public function multi_convert($data)
    {
    foreach ($data as $value) 
      {
      return convert($data);
      }
    }  

  public function lookup($locale, $num)
    {
    $doc = new DOMDocument;

    $doc->LoadHTML($this->markup);

    $xpath = new DOMXPath($doc);

    $xpath->registerNameSpace('html', 'http://www.w3.org/1999/xhtml');

    $query = $xpath->query("//input[@id='$locale']/@value");

    $multiplier = $query->item(0)->nodeValue;

    $value = $num * $multiplier;

    return array ($locale, $value);
    }
  }
?>
