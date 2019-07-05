<?php
declare(strict_types=1);


namespace Common\Helper;


class DateHelper
{
    static public function getTodayZero()
    {
        return strtotime(date('Y-m-d 00:00:00', time()));
    }
}