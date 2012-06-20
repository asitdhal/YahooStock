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

class Quote {
    
    private $change;                          // c1
    private $trade_date;                      // d2
    private $week52_low;                      // j
    private $change_from_week52_low;          // j5
    private $percebt_change_from_week52_high; // k5
    private $open;                            // o
    private $change_in_percent;               // p2
    private $ex_dividend_date;                // q
    private $days_low;                        // g
    private $week52_high;                     // k
    private $percent_change_from_week52_low;  // j6
    private $last_trade_size;                 // k3
    private $previous_close;                  // p
    private $symbol;                          // s
    private $last_trade_time;                 // t1
    private $last_trade_date;                 // d1
    private $days_high;                       // h
    private $change_from_week52_high;         // k4
    private $last_trade_price;                // l1
    private $volume;                          // v
    private $stock_exchange;                  // x

    public function mQuote($p_change='',
                           $p_trade_date='',
                           $p_week52_low='',
                           $p_change_from_week52_low='',
                           $p_percebt_change_from_week52_high='',
                           $p_open='',
                           $p_change_in_percent='',
                           $p_ex_dividend_date='',
                           $p_days_low='',
                           $p_week52_high='',
                           $p_percent_change_from_week52_low='',
                           $p_last_trade_size='',
                           $p_previous_close='',
                           $p_symbol='',
                           $p_last_trade_time='',
                           $p_last_trade_date='',
                           $p_days_high='',
                           $p_change_from_week52_high='',
                           $p_last_trade_price='',
                           $p_volume='',
                           $p_stock_exchange='' ) {
                    
        $this->change = $p_change;
        $this->trade_date = $p_trade_date;
        $this->week52_low = $p_week52_low;
        $this->change_from_week52_low = $p_change_from_week52_low;
        $this->percebt_change_from_week52_high = $p_percebt_change_from_week52_high;
        $this->open = $p_open;
        $this->change_in_percent = $p_change_in_percent;
        $this->ex_dividend_date = $p_ex_dividend_date;
        $this->days_low = $p_days_low;
        $this->week52_high = $p_week52_high;
        $this->percent_change_from_week52_low = $p_percent_change_from_week52_low;
        $this->last_trade_size = $p_last_trade_size;
        $this->previous_close = $p_previous_close;
        $this->symbol = $p_symbol;
        $this->last_trade_time = $p_last_trade_time;
        $this->last_trade_date = $p_last_trade_date;
        $this->days_high = $p_days_high;
        $this->change_from_week52_high = $p_change_from_week52_high;
        $this->last_trade_price = $p_last_trade_price;
        $this->volume = $p_volume;
        $this->stock_exchange = $p_stock_exchange;
    
    }
    
    public function GetChange() {
        return $this->change;
        }

    public function GetTradeDate() {
        return $this->trade_date;
    }

    public function GetWeek52Low() {
        return $this->week52_low;
    }

    public function GetChangeFromWeek52Low() {
        return $this->change_from_week52_low;
    }

    public function GetPercebtChangeFromWeek52High() {
        return $this->percebt_change_from_week52_high;
    }

    public function GetOpen() {
        return $this->open;
    }

    public function GetChangeInPercent() {
        return $this->change_in_percent;
    }

    public function GetExDividendDate() {
        return $this->ex_dividend_date;
    }

    public function GetDaysLow() {
        return $this->days_low;
    }

    public function GetWeek52High() {
        return $this->week52_high;
    }

    public function GetPercentChangeFromWeek52Low() {
        return $this->percent_change_from_week52_low;
    }

    public function GetLastTradeSize() {
        return $this->last_trade_size;
    }

    public function GetPreviousClose() {
        return $this->previous_close;
    }

    public function GetSymbol() {
        return $this->symbol;
    }

    public function GetLastTradeTime() {
        return $this->last_trade_time;
    }

    public function GetLastTradeDate() {
        return $this->last_trade_date;
    }

    public function GetDaysHigh() {
        return $this->days_high;
    }

    public function GetChangeFromWeek52High() {
        return $this->change_from_week52_high;
    }

    public function GetLastTradePrice() {
        return $this->last_trade_price;
    }

    public function GetVolume() {
        return $this->volume;
    }

    public function GetStockExchange() {
        return $this->stock_exchange;
    }

    public function SetChange($p_change) {
        $this->change = $p_change;
    }

    public function SetTradeDate($p_trade_date) {
        $this->trade_date = $p_trade_date;
    }

    public function SetWeek52Low($p_week52_low) {
        $this->week52_low = $p_week52_low;
    }

    public function SetChangeFromWeek52Low($p_change_from_week52_low) {
        $this->change_from_week52_low = $p_change_from_week52_low;
    }

    public function SetPercebtChangeFromWeek52High($p_percebt_change_from_week52_high) {
        $this->percebt_change_from_week52_high = $p_percebt_change_from_week52_high;
    }

    public function SetOpen($p_open) {
        $this->open = $p_open;
    }

    public function SetChangeInPercent($p_change_in_percent) {
        $this->change_in_percent = $p_change_in_percent;
    }

    public function SetExDividendDate($p_ex_dividend_date) {
        $this->ex_dividend_date = $p_ex_dividend_date;
    }

    public function SetDaysLow($p_days_low) {
        $this->days_low = $p_days_low;
    }

    public function SetWeek52High($p_week52_high) {
        $this->week52_high = $p_week52_high;
    }

    public function SetPercentChangeFromWeek52Low($p_percent_change_from_week52_low) {
        $this->percent_change_from_week52_low = $p_percent_change_from_week52_low;
    }

    public function SetLastTradeSize($p_last_trade_size) {
        $this->last_trade_size = $p_last_trade_size;
    }

    public function SetPreviousClose($p_previous_close) {
        $this->previous_close = $p_previous_close;
    }

    public function SetSymbol($p_symbol) {
        $this->symbol = $p_symbol;
    }

    public function SetLastTradeTime($p_last_trade_time) {
        $this->last_trade_time = $p_last_trade_time;
    }

    public function SetLastTradeDate($p_last_trade_date) {
        $this->last_trade_date = $p_last_trade_date;
    }

    public function SetDaysHigh($p_days_high) {
        $this->days_high = $p_days_high;
    }

    public function SetChangeFromWeek52High($p_change_from_week52_high) {
        $this->change_from_week52_high = $p_change_from_week52_high;
    }

    public function SetLastTradePrice($p_last_trade_price) {
        $this->last_trade_price = $p_last_trade_price;
    }

    public function SetVolume($p_volume) {
        $this->volume = $p_volume;
    }

    public function SetStockExchange($p_stock_exchange) {
        $this->stock_exchange = $p_stock_exchange;
    }

}