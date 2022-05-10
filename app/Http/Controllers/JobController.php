<?php

namespace App\Http\Controllers;
use App\Models\job_detail;
use App\Models\job;
use App\Models\company;

use App\Models\working_format;
use App\Models\distribution;
use App\Models\category;
use App\Models\apply_job;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use App\Classes\HomeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;

class JobController extends Controller
{

    protected $_homecontroller;

    public function __construct(HomeController $homeController)
    {
        $this->_homecontroller = $homeController;
    }

    public function job_browser(){
        // $homecontroller = new HomeController();
        $job_list = $this->_homecontroller->getJob();
        $working_format = working_format::orderby('id_working_format', 'desc')->get();
        $category = category::where('category_status','1')->orderby('id_category', 'desc')->get();
        return view('customer.job_browser')
        ->with('job_list',$job_list)
        ->with('work_type',$working_format)
        ->with('category',$category);
    }
    public function job_detail(){
        return view('customer.job_detail');
    }
    public function detail_job($id_job){
       $data = job_detail::where('id_job',$id_job)->with('company','job')->first();
       $distribution = job::where('job_id',$id_job)->with('distribution')->first();
       return view('customer.job_detail')->with('data',$data)->with('distribution',$distribution);
    }

    // job backend

    public function job_list(){
        $list_job = job::where('job_status','>=','2')->orderby('job_id','asc')
        ->with('admin','category','distribution','working_format')
        ->get();
        return view('admin.job.list_job')->with('list_job',$list_job);
    }
    public function job_new(){
        $list_job = job::where('job_status','1')
        ->with('category','distribution','working_format')
        ->orderby('job_id','asc')
        ->get();
        return view('admin.job.job_new')->with('list_job',$list_job);
    }
    public function confirm_job($job_id){
        $job_new = job::where('job_id',$job_id)->first();
        if($job_new){
            $job_new->job_status = 3;
            $job_new->save();
            Session::put('message','Bài viết đã được xác nhận');
            return Redirect()->back();
        }
        else{
            Session::put('message','Không có bài đăng nào được tìm thấy');
            return Redirect()->back();
        }
    }
    public function view_job($job_id){
        $job = job_detail::where('id_job',$job_id)->with('company','job')->first();
        if($job){
            $info_job = job::where('job_id',$job->id_job)->with('admin','category','distribution','working_format')->first();
            return view('admin.job.view_job')->with('jobview',$job)->with('infor_job',$info_job);
        }
        else{
            Session::put('message','Không có coong việc nào được tìm thấy');
            return Redirect()->back();
        }
    }
    public function getJobById($id){
        return job::find($id);
    }

}
