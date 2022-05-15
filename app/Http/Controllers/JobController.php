<?php

namespace App\Http\Controllers;

use App\Models\job_detail;
use App\Models\job;
use App\Models\company;

use App\Models\working_format;
use App\Models\distribution;
use App\Models\category;
use App\Models\apply_job;
use App\Models\favourite_job;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use App\Classes\HomeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\App;

class JobController extends Controller
{

    protected $_homecontroller;
    protected $_favouritejob;

    public function __construct(HomeController $homeController, favourite_job $favouritejob)
    {
        $this->_homecontroller = $homeController;
        $this->_favouritejob = $favouritejob;
    }

    public function job_browser()
    {
        $homeController = App::make("App\Http\Controllers\HomeController");
        $job_list = $homeController->getJob();
        $working_format = working_format::orderby('id_working_format', 'desc')->get();
        $category = category::where('category_status', '1')->orderby('id_category', 'desc')->get();
        $distribution = distribution::where('distribution_status', '1')->orderby('id_distribution', 'desc')->get();
        return view('customer.job_browser')
            ->with('job_list', $job_list)
            ->with('work_type', $working_format)
            ->with('distribution', $distribution)
            ->with('category', $category);
    }
    public function job_detail()
    {
        return view('customer.job_detail');
    }
    public function detail_job($id_job)
    {
        $data = job_detail::where('id_job', $id_job)->with('company', 'job')->first();
        $distribution = job::where('job_id', $id_job)->with('distribution')->first();
        $relate_job = job::where('id_category',$distribution->id_category)
        ->whereNotIn('job_id',[$id_job])->where('job_status',3)->take(4)->get();
        $user = Session::get('user_id');
        if ($user) {
            $favouritejob = $this->_favouritejob->isFavouriteJob($user, $id_job);
        }
        if (!empty($favouritejob)) {
            return view('customer.job_detail')->with('data', $data)->with('distribution', $distribution)->with('isFavouriteJob', $favouritejob)->with('relate_job',$relate_job);
        } else {
            return view('customer.job_detail')->with('data', $data)->with('distribution', $distribution)->with('relate_job',$relate_job);
        }
    }

    // job backend

    public function job_list()
    {
        $list_job = job::where('job_status', '>=', '2')->orderby('job_id', 'asc')
            ->with('admin', 'category', 'distribution', 'working_format')
            ->get();
        return view('admin.job.list_job')->with('list_job', $list_job);
    }
    public function job_new()
    {
        $list_job = job::where('job_status', '1')
            ->with('category', 'distribution', 'working_format')
            ->orderby('job_id', 'asc')
            ->get();
        return view('admin.job.job_new')->with('list_job', $list_job);
    }
    public function confirm_job($job_id)
    {
        $job_new = job::where('job_id', $job_id)->first();
        if ($job_new) {
            $job_new->job_status = 3;
            $job_new->save();
            Session::put('message', 'Bài viết đã được xác nhận');
            return Redirect()->back();
        } else {
            Session::put('message', 'Không có bài đăng nào được tìm thấy');
            return Redirect()->back();
        }
    }
    public function view_job($job_id)
    {
        $job = job_detail::where('id_job', $job_id)->with('company', 'job')->first();
        if ($job) {
            $info_job = job::where('job_id', $job->id_job)->with('admin', 'category', 'distribution', 'working_format')->first();
            return view('admin.job.view_job')->with('jobview', $job)->with('infor_job', $info_job);
        } else {
            Session::put('message', 'Không có coong việc nào được tìm thấy');
            return Redirect()->back();
        }
    }
    public function getJobById($id)
    {
        return job::find($id);
    }
    public function getDetailJobById($id)
    {
        return job_detail::where('id_job', $id)->with('company')->first();
    }

    public function searchJob(Request $request){
        $data_post = $request->all();
        $category = category::where('category_name',$data_post['category'])->first();
        $distribution = distribution::where('distribution_name',$data_post['distribution'])->first();
        $working_format = working_format::where('working_format_name',$data_post['workingformat'])->first();

        $list_job = job::orderby('job_id','asc');

        if(!empty($category)){
            $list_job = $list_job->where('id_category', $category['id_category']);
        }
        if(!empty($distribution)){
            $list_job = $list_job->where('id_distribution', $distribution['id_distribution']);
        }
        if(!empty($working_format)){
            $list_job = $list_job->where('id_working_format', $working_format['id_working_format']);
        }
        $list_job = $list_job->paginate(1);
        $list_job->appends(['category' => $data_post['category']])
        ->appends(['distribution' => $data_post['distribution']])
        ->appends(['workingformat' => $data_post['workingformat']]);
        return view('customer.resultsearch')->with('result_search',$list_job);

    }
}
