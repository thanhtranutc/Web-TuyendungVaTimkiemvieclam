<?php

function checkDuration($start_time)
{
    $time = Carbon\Carbon::parse($start_time)->format('Y-m-d');
    $current_time = Carbon\Carbon::now()->format('Y-m-d');
    $start = Carbon\Carbon::parse($time);
    $end = Carbon\Carbon::parse($current_time);

    $day = $start->diffInDays($end);
    // $day= date('d', mktime($time) - mktime($current_time));
    $text = "Hết hạn ứng tuyển";
    if ($day > 0) {
        return $start_time;
    } else {
        return $text;
    }
}
