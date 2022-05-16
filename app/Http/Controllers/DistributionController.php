<?php

namespace App\Http\Controllers;

use App\Models\distribution;
use App\Models\job;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DistributionController extends Controller
{
    public function getJobByCity($id)
    {
        # code...
        $listjob = job::where('id_distribution',$id)->where('job_status',3)->paginate(10);
        $city = distribution::where('id_distribution',$id)->first();
        return view('customer.jobbycity')->with('listjob',$listjob)->with('city',$city);
    }
    public function test()
    {
        $timein = '19:25:25 05-19-2022';


        $timeout = '19:25:25 07-19-2022';

        // $_stockupdate= Carbon::parse($timein)->format('Y-m-d'); 
        // $mytime = Carbon::now()->format('Y-m-d');


        $day= date("d", mktime($timeout) - mktime($timein));
        echo $day;


        // echo $_stockupdate;

        // echo date('d m y H:i:s', strtotime($timeout) - strtotime($timein));

        
        // $start = Carbon::parse($_stockupdate);
        // $end = Carbon::parse($mytime);
        // $day = $end->diffInDays($start);
        // $mon = $end->diffInMonths($start);
        // $year = $end->diffInYears($start);

        // echo $day . ':' . $mon.':'.$year;
    }

}
