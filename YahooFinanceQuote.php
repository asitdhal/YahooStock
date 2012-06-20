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

require_once('FetchQuoteFromYahoo.php');
require_once('Quote.php');

interface InterfaceYahooFinanceQuote {
    
    public function GetQuoteList();
    
}

class YahooFinanceQuote implements InterfaceYahooFinanceQuote {
    
    private $market_data;
    private $yahoo_fetcher;
    private $symbol_list;
    private $run_flg;
    private $quote_list;
    
    
    public function YahooFinanceQuote($symbol_list) {
        $this->symbol_list = $symbol_list;
        $this->yahoo_fetcher = new FetchQuoteFromYahoo();
        $this->run_flg = false;
        $this->quote_list = array();
        $this->market_data = array();
        $this->Process();
    }
    
    private function Process() {
        if ( $this->run_flg == false ) {
            $this->run_flg = true;
            $this->yahoo_fetcher->process($this->symbol_list);
            $this->market_data = $this->yahoo_fetcher->YahooMarketData();
        }
        else {
            echo "Warning....process() is already executing...\n";
        }
    }
    
    public function GetQuoteList() {
        foreach( $this->market_data as $val1 ) {
            $ob = new Quote();
            foreach ($val1 as $key => $val2 ) {
                switch ($key) {
                    case 'Change':
                        $ob->SetChange($val2);
                        break;
                    case 'Trade Date':
                        $ob->SetTradeDate($val2);
                        break;
                    case '52-week Low' :
                        $ob->SetWeek52Low($val2);
                        break;
                    case 'Change From 52-week Low' :
                        $ob->SetChangeFromWeek52Low($val2);
                        break;
                    case 'Percebt Change From 52-week High' :
                        $ob->SetPercebtChangeFromWeek52High($val2);
                        break;
                    case 'Open' :
                        $ob->SetOpen($val2);
                        break;
                    case 'Change in Percent' :
                        $ob->SetChangeInPercent($val2);
                        break;
                    case 'Ex-Dividend Date' :
                        $ob->SetExDividendDate($val2);
                        break;
                    case 'Day\'s Low' :
                        $ob->SetDaysLow($val2);
                        break;
                    case '52-week High' :
                        $ob->SetWeek52High($val2);
                        break;
                    case 'Percent Change From 52-week Low' :
                        $ob->SetPercentChangeFromWeek52Low($val2);
                        break;
                    case 'Last Trade Size' :
                        $ob->SetLastTradeSize($val2);
                        break;
                    case 'Previous Close' :
                        $ob->SetPreviousClose($val2);
                        break;
                    case 'Symbol' :
                        $ob->SetSymbol($val2);
                        break;
                    case 'Last Trade Time' :
                        $ob->SetLastTradeTime($val2);
                        break;
                    case 'Last Trade Date' :
                        $ob->SetLastTradeDate($val2);
                        break;
                    case 'Day\'s High' :
                        $ob->SetDaysHigh($val2);
                        break;
                    case 'Change From 52-week High' :
                        $ob->SetChangeFromWeek52High($val2);
                        break;
                    case 'Last Trade (Price Only)' :
                        $ob->SetLastTradePrice($val2);
                        break;
                    case 'Volume' :
                        $ob->SetVolume($val2);
                        break;
                    case 'Stock Exchange' :
                        $ob->SetStockExchange($val2);
                        break;
                };
            }
            array_push( $this->quote_list, $ob);
        }
        print_r($this->quote_list);
        return $this->quote_list;
        
    }
}

?>