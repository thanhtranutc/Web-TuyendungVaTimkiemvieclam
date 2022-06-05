<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\job;
use App\Models\apply_job;
use App\Models\customer;
use App\Models\distribution;
use App\Models\category;
use App\Models\working_format;
use App\Models\company;
use App\Models\experience;
use App\Models\job_detail;
use App\Models\notification;
use App\Models\profile;
use App\Services\StaticticService;
use App\Services\RecruiterService;
use App\Services\JobService;
use App\Repositories\JobRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;
use PHPUnit\Util\Json;

class RecruiterController extends Controller
{
    protected $_notificationCollection;
    protected $_staticticService;
    protected $_jobRepository;
    protected $_recruiterService;
    protected $_jobService;

    public function __construct(
        JobRepository $jobRepository,
        notification $notificationCollection,
        RecruiterService $recruiterService,
        JobService $jobService,
        StaticticService $staticticService)
    {
        $this->_notificationCollection = $notificationCollection;
        $this->_staticticService = $staticticService;
        $this->_jobRepository = $jobRepository;
        $this->_recruiterService = $recruiterService;
        $this->_jobService = $jobService;
    }

    public function list_jobpost()
    {
        $id = Session::get('admin_id');
        $job_post = job::where('id_user', $id)->where('job_status','<','5')->orderby('job_id', 'asc')
            ->paginate(4);
        if ($job_post) {
            return view('recruiter.list_post')->with('listjob', $job_post);
        } else {
            return null;
        }
    }
    public function list_candidate($id_job)
    {
        $list_profile = apply_job::where('id_job', $id_job)->get();
        try {
            if ($list_profile)
                foreach ($list_profile as $item) {
                    // $id_user = profile::where('id_profile', $item->id_profile)->first();
                    $info_user = customer::where('user_id', $item->id_user)->first();
                    $list_user[] = $info_user;
                }
            Session::put('id_job', $id_job);
            return view('recruiter.list_candidate')->with('list_candidate', $list_user);
        } catch (\Throwable $th) {
            return view('recruiter.list_candidate');
        }
    }
    public function view_profile($id_user, Request $request)
    {
        $data_post = $request->all();

        $user_infor = customer::where('user_id', $id_user)->first();
        $user_profile = profile::where('id_user', $id_user)->first();
        $list_experience = experience::where('id_user', $id_user)->get();
        // create notify to customer
        $notify = $this->_notificationCollection->checkNotification($id_user,$data_post['job']);
        if(empty($notify)){
        $notifi = new notification();
        $notifi->id_user = $id_user;
        $notifi->notification_title = __('Nhà tuyển dụng đã xem hồ sơ của bạn');
        $notifi->notification_status = 0;
        $notifi->id_job = $data_post['job'];
        $notifi->save();
        }

        return view('admin.user.profile')->with('user_info', $user_infor)->with('user_profile', $user_profile)->with('list_experience', $list_experience);
    }
    public function page_addjob()
    {
        $list_distribu = distribution::where('distribution_status', '1')->get();
        $list_category = category::where('category_status', '1')->get();
        $list_working_format = working_format::where('working_format_status', '1')->get();
        $list_company = company::where('company_status', '1')->get();
        return view('recruiter.post_job')->with('distribution', $list_distribu)
            ->with('category', $list_category)
            ->with('working_format', $list_working_format)
            ->with('list_company', $list_company);
    }
    public function add_job(Request $request)
    {
        $data  = $request->all();

        $working_format = working_format::where('working_format_name', $data['working_format'])->first();
        $category = category::where('category_name', $data['category'])->first();
        $distribution = distribution::where('distribution_name', $data['distribution'])->first();
        $id_user = Session::get('admin_id');

        //insert job table
        $new_job = new job();
        $new_job->id_user = $id_user;
        $new_job->id_category = $category['id_category'];
        $new_job->id_distribution = $distribution['id_distribution'];
        $new_job->id_working_format = $working_format['id_working_format'];
        $new_job->job_status = 1;
        $new_job->job_desc = $data['job_title'];
        $new_job->save();
        $job_id =  $new_job->job_id;
        //insert company table

        if ($data['company_name'] != null) {
            $new_company = new company();
            $new_company->company_name = $data['company_name'];
            $new_company->company_desc = $data['company_desc'];
            $new_company->company_adress = $data['company_adress'];
            $new_company->company_status = 1;
            $new_company->company_image = '';
            $new_company->save();
            $company_id = $new_company->company_id;
        }

        //insert detai_job table
        $new_detailjob = new job_detail();
        $new_detailjob->detail_job_request = $data['job_requirement'];
        $new_detailjob->detail_job_desc = $data['job_desc'];
        $new_detailjob->detail_job_duration = $data['job_duration'];
        $new_detailjob->salary_up = $data['salary_up'];
        $new_detailjob->salary_down = $data['salary_down'];
        $new_detailjob->detail_job_status = 0;
        $new_detailjob->detail_job_salary = 0;
        $new_detailjob->id_job = $job_id;
        if (isset($company_id)) {
            $new_detailjob->id_company = $company_id;
        } else {
            $company = company::where('company_name', $data['company_id'])->first();
            $new_detailjob->id_company = $company['company_id'];
        }
        $new_detailjob->save();

        Session::put('notifi', 'Bài đăng đã được thêm, vui lòng chờ admin xác nhận');
        return Redirect()->back();

    }

    public function showPageStatistic()
    {
        $idRecruiter = Session::get('admin_id');
        $countPost = $this->_staticticService->getCountPostByRecruiter($idRecruiter);
        $countUserApply = $this->_staticticService->getCountApply($idRecruiter);
        $jobTopViews = $this->_jobRepository->getJobTopViews($idRecruiter);
        $getCountUserApply = $this->_staticticService->getCountUserApply($idRecruiter);
        $staticJobs = $this->_staticticService->getTotalJobByMonth($idRecruiter,2022);
        $staticApply = $this->_staticticService->getTotalCadidateByMonth($idRecruiter,2022);
        return view('recruiter.StaticticPage',['staticJobs'=> $staticJobs,'staticApply'=> $staticApply])
        ->with('countUserApply',$countUserApply)
        ->with('jobTopViews',$jobTopViews)
        ->with('countPost',$countPost)
        ->with('getCountUserApply',$getCountUserApply);
    }

    public function getStaticticByYear(Request $request)
    {
        $dataPost = $request->all();
        $idRecruiter = Session::get('admin_id');
        $year = $dataPost['year'];
        $staticYear = $this->_staticticService->getTotalJobByMonth($idRecruiter,$year);
        $staticApplyYear = $this->_staticticService->getTotalCadidateByMonth($idRecruiter,$year);
        return response()->json(['staticYear'=>$staticYear,'staticApplyYear'=>$staticApplyYear]);
    }
    public function showRegisterPage()
    {
        return view('recruiter.Register');
    }
    public function saveRecuiter(Request $request)
    {
        $dataPost = $request;
        $this->_recruiterService->saveRecruiter($dataPost);
        Session::put('notifi', 'Đăng ký thành công vui lòng chờ admin xác nhận !');
        return Redirect::to('/register_recuiter');
    }

    public function deletePost($id){
        $this->_jobService->deleteJob($id);
        return redirect()->back();
    }
}
