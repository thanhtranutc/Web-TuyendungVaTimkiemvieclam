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

        $data = job::groupBy('id_distribution')->selectRaw('count(*) as total, id_distribution')->orderby('total','desc')->take(2)->get();
        foreach($data  as $value){
        echo $value;
        }
        die;
        return view('customer.test');
    }

}
