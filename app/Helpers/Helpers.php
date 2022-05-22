<?php

function checkDuration($start_time)
{
    $time_end = Carbon\Carbon::create($start_time)->timestamp;
    $current_time = Carbon\Carbon::now()->timestamp;
   
    $day = $time_end - $current_time;
    $text = "Hết hạn ứng tuyển";
    if ($day > 0) {
        return Carbon\Carbon::create($start_time)->format('d-m-Y');
    } else {
        return $text;
    }
}
