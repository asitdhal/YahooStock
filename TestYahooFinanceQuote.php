<?php
   
require_once('YahooFinanceQuote.php');

//$symbols = array("ACROPETAL.NS", "HINDALCO.NS", "ALICON.NS");

$file = file_get_contents('symbol-list.txt', true);

$symbols = array();

$idx = 0;

foreach(explode("\n", $file) as $key => $val) {
   $sym = trim($val);
   if(strlen($sym)>0) {
      $symbols[$idx] = $sym . ".NS";
      $idx++;
      if ($idx > 3)
         break;
   }
}



$yahoo_ob = new YahooFinanceQuote($symbols);
//$yahoo_ob->process($symbols);
var_export($yahoo_ob->GetQuoteList());

?>   
