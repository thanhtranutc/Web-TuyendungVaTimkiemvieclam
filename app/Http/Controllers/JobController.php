<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function job_browser(){
        return view('customer.job_browser');
    }
    public function job_detail(){
        return view('customer.job_detail');
    }
}
