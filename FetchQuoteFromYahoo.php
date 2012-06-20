<?php

/*
* Copyright 2012 Asit Kumar Dhal
*
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
* http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*/

require_once("load_web.php");

class FetchQuoteFromYahoo {
    
    private $URL = "http://finance.yahoo.com/d/quotes.csv?s=%s&f=%s";
    
    private $quotes;       //array of quotes
    private $debug;        //debug flag
    private $url;          //URL of Yahoo Finance Server
    private $symbol_list;  //list of symbols
    private $send_flg;     //Send Flag 
    private $tags;         //yahoo tags
    private $res_data;     //response from yahoo Server
        
    public function FetchQuoteFromYahoo($debug=false) {
        
        $this->debug = $debug;
        $this->quotes = array();
        $this->url = '';
        $this->symbol_list = array();
        $this->send_flg = true;
        $this->res_data = '';
        $this->quotes = array();
        
        $this->tags = array (
                      'c1'  => 'Change',
                      'd2'  => 'Trade Date',
                      'j'   => '52-week Low',
                      'j5'  => 'Change From 52-week Low',
                      'k5'  => 'Percebt Change From 52-week High',
                      'o'   => 'Open',
                      'p2'  => 'Change in Percent',
                      'q'   => 'Ex-Dividend Date',
                      'g'   => 'Day\'s Low',
                      'k'   => '52-week High',
                      'j6'  => 'Percent Change From 52-week Low',
                      'k3'  => 'Last Trade Size',
                      'p'   => 'Previous Close',
                      's'   => 'Symbol',
                      't1'  => 'Last Trade Time',
                      'd1'  => 'Last Trade Date',
                      'h'   => 'Day\'s High',
                      'k4'  => 'Change From 52-week High',
                      'l1'  => 'Last Trade (Price Only)',
                      'v'   => 'Volume',
                      'x'   => 'Stock Exchange',
                     );
        
    }
    
    private function buildUrl() {
        
        $req_symbols = "";
        $req_tags = "";

        $sym_count = 0;
        
        foreach($this->symbol_list as $key => $val) {
            if(strlen($req_symbols) != 0) {
                $req_symbols = $req_symbols . "+" . $val;
                $sym_count++;
                if($sym_count == 5) {
                    $this->send_flg = true;
                    $temp_symbol_list = array_slice($this->symbol_list, $sym_count);
                    $this->symbol_list = $temp_symbol_list;
                    break;
                }
            }
            else {
                $req_symbols = $val;
                $sym_count++;
            }
        }

        if ( $sym_count < 5) {
            $this->send_flg = false;
        }
        
        foreach($this->tags as $key => $val) {
            $req_tags = $req_tags  . $key;
        }

        $this->url = sprintf($this->URL, $req_symbols, $req_tags);

        if($this->debug == true) {
            echo "Symbol List : " . $req_symbols . "\n";
            echo "Tag List : " . $req_tags . "\n";
            echo "URL : " . $this->url . "\n";
        }
        
    }
    
    private function requestYahooFinance() {
      
        $options = array (
                    'return_info' => false,
                    'method'      => 'get'
                    );

        $this->res_data = load($this->url, $options);
        
        if($this->debug == true) {
            echo "Response From Yahoo Server: \n";
            echo $this->res_data;
            echo "\n";
        }

    }
    
    public function process($symbols) {
        if (is_array($symbols) == true){
            $this->symbol_list = $symbols;
        }      
        else {
            $this->aymbol_list = array($symbol);
        }
        while ( $this->send_flg == true ) {
            $this->buildUrl();   
            $this->requestYahooFinance();
            $this->splitResponseData();
        }
    }
    
    private function splitResponseData() {

        $response_line = explode("\n", $this->res_data);

        foreach($response_line as  $val) {
            
            $response = strip_tags($val);
            if ( strlen($response) > 0 ) {
                $quotes = str_getcsv($response);
                $det_quotes = array();
     
                $i = 0;

                foreach($this->tags as $val) {
                    $det_quotes["$val"] = str_ireplace('"', '', $quotes[$i]);
                    $i++;
                }

                $this->quotes[$det_quotes['Symbol']] = $det_quotes;
            }
            
        }

    }
    
    public function YahooMarketData() {
        return $this->quotes;
    }
    
}
