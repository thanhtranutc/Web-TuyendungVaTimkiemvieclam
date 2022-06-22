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
use App\Models\notification;
use App\Models\favourite_job;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Repositories\DistributionRepository;
use App\Repositories\WorkingformatRepository;
use App\Repositories\CategoryRepository;
use App\Services\DistributionService;
use App\Services\CategoryService;

use App\Http\Controllers\CustomerController;


class HomeController extends Controller
{

    // protected $list_job;
    protected $job_status = 3;
    protected $_customer;
    protected $_job;
    protected $_jobCollection;
    protected $_favouritejobCollection;
    protected $_distributionRepository;
    protected $_workingformatRepository;
    protected $_categoryRepository;
    protected $_distributionService;
    protected $_categoryService;

    public function __construct(
        CustomerController $customer,
        job $jobCollection,
        DistributionRepository $distributionRepository,
        WorkingformatRepository $workingformatRepository,
        CategoryRepository $categoryRepository,
        DistributionService $distributionService,
        CategoryService $categoryService,
        favourite_job $favouritejobCollection
    ) {
        $this->_customer = $customer;
        $this->_favouritejobCollection = $favouritejobCollection;
        $this->_favouritejobCollection = $favouritejobCollection;
        $this->_distributionRepository = $distributionRepository;
        $this->_workingformatRepository = $workingformatRepository;
        $this->_categoryRepository = $categoryRepository;
        $this->_distributionService = $distributionService;
        $this->_categoryService = $categoryService;
    }

    public function index()
    {
        $distribution = $this->_distributionRepository->getAllDistribution();
        $topDistribution = $this->_distributionService->getTopDistribution();
        $topCategory = $this->_categoryService->getTopCategory();
        $working_format = $this->_workingformatRepository->getAllWorkingformat();
        $list_job = $this->getJob();
        return view('customer.homepage')
        ->with('list_job', $list_job)
        ->with('list_distribution',$distribution)
        ->with('topDistribution',$topDistribution)
        ->with('topCategory',$topCategory)
        ->with('list_workingformat',$working_format);
    }
    public function count_job_distribution($id_distribution)
    {
        $count = count(job::where('id_distribution', $id_distribution)->where('job_status',3)->get());
        return $count;
    }
    public function login_customer()
    {
        return view('customer.login');
    }
    public function register_customer()
    {
        return view('customer.register');
    }
    public function job_total()
    {
        $count = job::where('job_status',3)->orderby('job_id', 'desc')->get();
        return count($count);
    }
    public function logout()
    {
        Session::flush();
        return $this->index();
    }

    //get job list
    public function getJob()
    {
        $list_job = job::orderby('job_date', 'desc')
            ->where('job_status', $this->job_status)
            ->take(10)
            ->paginate(5);
        return $list_job;
    }

    // format number money
    public function money_format($salary)
    {
        $count = strlen($salary);
        if ($count >= 7)
            $data = substr($salary, 0, $count - 6);
        return $data;
    }
    public function contact_page()
    {
        return view('customer.contact');
    }
    public function showFavouritePage()
    {
        $user = Session::get('user_id');
        if($user){
            $list_favouritejob = $this->_favouritejobCollection->getFavouriteJobByIdUser($user);
        }
        if(isset($list_favouritejob) && count($list_favouritejob)>=1){
            return view('customer.favouritejob')->with('list_favouritejob',$list_favouritejob);
        }else{
            return view('customer.favouritejob');
        }
    }

    public function candidate_page()
    {
        $id_user = Session::get('user_id');
        $list_job_applied = $this->getAppliedJob($id_user);
        $userCurent = $this->_customer->getUserById($id_user);
        $notification = $this->getListNotifyByUserId($id_user);

        return view('customer.candidate')
            ->with('userInfor', $userCurent)
            ->with('list_job', $list_job_applied)
            ->with('notify', $notification);
    }

    public function count_cv_candidate()
    {
        $count_cv =  count(profile::orderby('id_profile', 'asc')->get());
        return $count_cv;
    }

    public function getCategory()
    {
        $list_category = category::orderby('id_category', 'asc')->get();
        return $list_category;
    }

    public function getCountJobByCategory($id)
    {
        $count_job = count(job::where('id_category', $id)->get());
        return $count_job;
    }

    protected function getAppliedJob($id_user)
    {
        $list_job = array();
        $job_id = apply_job::where('id_user', $id_user)->get();
        if ($job_id) {
            foreach ($job_id as $item) {
                $job = job::where('job_id', $item->id_job)->with('distribution', 'working_format')->first();
                $list_job[] = $job;
            }
            return $list_job;
        }
        return null;
    }

    protected function getListNotifyByUserId($id)
    {
        return notification::where('id_user', $id)->get();
    }
    public function showAboutusPage()
    {
        return view('customer.AboutUs');
    }
}
