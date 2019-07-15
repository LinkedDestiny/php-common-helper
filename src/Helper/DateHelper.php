<?php
declare(strict_types=1);


namespace Common\Helper;


use DateTime;

class DateHelper
{
    static public function getTodayZero()
    {
        return strtotime(date('Y-m-d 00:00:00', time()));
    }

    /**
     * @param $time
     * @return string
     * @throws \Exception
     */
    static public function gmt_iso8601($time) {
        $dtStr = date("c", $time);
        $mydatetime = new DateTime($dtStr);
        $expiration = $mydatetime->format(DateTime::ISO8601);
        $pos = strpos($expiration, '+');
        $expiration = substr($expiration, 0, $pos);
        return $expiration."Z";
    }
}