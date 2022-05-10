<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\distribution;
use App\Models\job;
use App\Models\company;
use App\Models\job_detail;
use App\Models\experience;
use App\Models\profile;
use App\Models\apply_job;
use App\Models\working_format;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\CustomerController;


class HomeController extends Controller
{
 
    // protected $list_job;
    protected $job_status = 3;
    protected $_customer;
    protected $_job;

    public function __construct(CustomerController $customer)
    {
        $this->_customer = $customer;
    }

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
        return $this->index();
    }

    //get job list
    public function getJob(){
        $list_job = job::orderby('job_id','asc')->with('distribution','working_format')->where('job_status',$this->job_status)->paginate(3);
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

    public function candidate_page(){
        $id_user = Session::get('user_id');
        // $job_id = apply_job::find($id_user);
        // print_r(json_encode($job_id));die;
        $userCurent = $this->_customer->getUserById($id_user);

        return view('customer.candidate')->with('userInfor',$userCurent);
    }

    public function count_cv_candidate(){
        $count_cv =  count(profile::orderby('id_profile','asc')->get());
        return $count_cv;
    }

    public function getCategory(){
        $list_category = category::orderby('id_category','asc')->get();
        return $list_category;
    }

    public function getCountJobByCategory($id){
        $count_job = count(job::where('id_category',$id)->get());
        return $count_job;
    }
    
}
