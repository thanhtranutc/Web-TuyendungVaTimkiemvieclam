<?php

namespace App\Http\Controllers;

use App\Models\distribution;
use App\Models\job;
use Illuminate\Http\Request;

class DistributionController extends Controller
{
    public function getJobByCity($id)
    {
        # code...
        $listjob = job::where('id_distribution',$id)->where('job_status',3)->paginate(10);
        $city = distribution::where('id_distribution',$id)->first();
        return view('customer.jobbycity')->with('listjob',$listjob)->with('city',$city);
    }
}
