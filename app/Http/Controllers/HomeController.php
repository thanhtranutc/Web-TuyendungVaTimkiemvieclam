<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\distribution;
use App\Models\job;
use App\Models\company;
use App\Models\job_detail;
use App\Models\working_format;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    // protected $list_job;

    public function index(){
        $city= distribution::orderby('id_distribution','asc')->take(3)->get();
        $list_job= $this->getJob();
        return view('customer.homepage')->with('city',$city)->with('list_job',$list_job);
    }
    public function count_job_distribution($id_distribution){
        $count = count(job::where('id_distribution',$id_distribution)->get());
        return $count;
    }
    public function login_customer(){
        return view('customer.login');
    }
    public function register_customer(){
        return view('customer.register');
    }
    public function job_total(){
        $count = job::orderby('job_id','desc')->get();
        return count($count);
    } 
    public function logout(){
        Session::flush();
        $city= distribution::orderby('id_distribution','asc')->take(3)->get();
        return view('customer.homepage')->with('city',$city);
    }

    //get job list
    public function getJob(){
        $list_job = job::orderby('job_id','asc')->with('distribution','working_format')->get();
        return $list_job;
    }

    // format number money
    public function money_format($salary){
        $count = strlen($salary);
        if($count>=7)
        $data = substr($salary, 0, $count-6);
        return $data;
    }
    public function contact_page(){
        return view('customer.contact');
    }

}
