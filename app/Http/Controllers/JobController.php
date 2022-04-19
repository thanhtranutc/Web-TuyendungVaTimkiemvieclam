<?php

namespace App\Http\Controllers;
use App\Models\job_detail;
use App\Models\job;
use App\Models\company;
use App\Models\distribution;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function job_browser(){
        return view('customer.job_browser');
    }
    public function job_detail(){
        return view('customer.job_detail');
    }
    public function detail_job($id_job){
       $data = job_detail::where('id_job',$id_job)->with('company','job')->first();
       $distribution = job::where('job_id',$id_job)->with('distribution')->first();
       return view('customer.job_detail')->with('data',$data)->with('distribution',$distribution);
    }
}
