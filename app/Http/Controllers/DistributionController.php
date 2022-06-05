<?php

namespace App\Http\Controllers;

use App\Models\distribution;
use App\Repositories\JobRepository;
use App\Models\job;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DistributionController extends Controller
{
    protected $_jobRepository;
    public function __construct(JobRepository $jobRepository)
    {
        $this->_jobRepository = $jobRepository;
    }
    public function getJobByCity($id)
    {
        # code...
        $listjob = job::where('id_distribution', $id)->where('job_status', 3)->paginate(10);
        $city = distribution::where('id_distribution', $id)->first();
        return view('customer.jobbycity')->with('listjob', $listjob)->with('city', $city);
    }
    public function test()
    {
        $job= $this->_jobRepository->checkJobDisable(3);
        printf(json_encode($job));die;
    }
}
