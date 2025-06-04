<?php

namespace Ngomafortuna\NumberFormatter;

/**
 * <b>ProcNum</b>
 * This class is a helper, to help formate number end date (angolan)
 * 
 * copyright (c) 2025, ngoma m. fortuna of the mostarda tec
 */
class NumberFormatter
{
    public static function format(int|float $number):object
    {
        if($number == 0 || $number == null) return (object)['short'=>0, 'full'=>0];

        switch ($number) {
            case $number < 1000000:
                $extentionVal = self::formatNumber($number);
                break;

            case $number == 1000000:
                $extentionVal = "1 milhão";
                break;

            case $number < 10000000:
                $extentionVal = "+ " . self::formatNumber($number/1000000) . " milhão";
                break;

            case $number == 10000000:
                $extentionVal = "10 milhões";
                break;

            case $number < 100000000:
                $extentionVal = "+ " . self::formatNumber($number/1000000) . " milhões";
                break;

            case $number == 100000000:
                $extentionVal = "100 milhões";
                break;
        
            case $number < 1000000000:
                $extentionVal = "+ " . self::formatNumber($number/1000000) . " milhões";
                break;

            case $number == 1000000000:
                $extentionVal = "1 bilhão";
                break;

            case $number < 1000000000000:
                $extentionVal = "+ " . self::formatNumber($number/1000000000) . " bilhões";
                break;

            case $number == 1000000000000:
                $extentionVal = "1 trilhão";
                break;

            default:
                $extentionVal = "+ 1 trilhões";
                break;
        }
        
        $compreetionVal = self::formatNumber($number);

        return (object)['short' => $extentionVal, 'full' => $compreetionVal];
    }

    public static function formatShort(int|float $number):object
    {
        
        if($number == 0) return (object)['short'=>0, 'full'=>0];
        
        switch ($number) {
            case $number == 0:
                $extentionVal = 0;
                break;

            case $number < 1000:
                $extentionVal = self::formatNumber($number);
                break;

            case $number == 1000:
                $extentionVal = "1K";
                break;

            case $number < 1000000:
                $extentionVal = "+" . self::formatNumber($number/1000) . "K";
                break;

            case $number == 1000000:
                $extentionVal = "1M";
                break;

            case $number < 1000000000:
                $extentionVal = "+" . self::formatNumber($number/1000000) . "M";
                break;

            case $number == 1000000000:
                $extentionVal = "1B";
                break;

            case $number < 1000000000000:
                $extentionVal = "+" . self::formatNumber($number/1000000000) . "B";
                break;

            case $number == 1000000000000:
                $extentionVal = "1T";
                break;

            default:
                $extentionVal = "+1T";
                break;
        }
        
        $compreetionVal = self::formatNumber($number);

        return (object)['short' => $extentionVal, 'full' => $compreetionVal];
    }

    public static function byte(int|float $number):string
    {
        
        if($number == 0) return '0 B';

        switch($number) {
            case $number < 1024:
                return self::formatNumber($number) . ' B';

            case $number < 1048576:
                return self::formatNumber($number/1024) . ' KB';

            case $number < 1073741824:
                return self::formatNumber($number/1048576) . ' MB';

            case $number < 1099511627776:
                return self::formatNumber($number/1073741824) . ' GB';

            case $number < 1000000000000000:
                return self::formatNumber($number/1099511627776) . ' TB';

            default:
                return 'INVALID_DATA';
        }
    }

    private static function formatNumber(int|float $value):string {
        return number_format($value, 0, ',', '.');
    }
}