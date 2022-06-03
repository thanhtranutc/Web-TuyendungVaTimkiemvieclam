<?php

namespace App\Repositories;

use App\Models\job;
use App\Models\job_detail;

class JobRepository {

    protected $_job;
    protected $_jobdetail;


    public function __construct(
        job $job,
        job_detail $jobdetail)
    {
        $this->_job = $job;
        $this->_jobdetail = $jobdetail;
    }

    public function getAllJob(){
        return $this->_job->all();
    }

    public function getCountTotalJob(){
        return count($this->getAllJob());
    }

    public function getJobDetailByCompanyid($id){
        return $this->_jobdetail->where('id_company',$id)->get();
    }

    public function getJobById($id){
        return $this->_job->find($id);
    }
    public function getJobDetailByIdJob($id){
        return $this->_jobdetail->where('id_job',$id)->first();
    }

    public function getGroupJobByDistribution()
    {
        return $this->_job->groupBy('id_distribution')
        ->selectRaw('count(*) as total, id_distribution')
        ->orderby('total','desc')->take(2)->get();
    }
    public function getGroupJobByCategory()
    {
        return $this->_job->groupBy('id_category')
        ->selectRaw('count(*) as total, id_category')
        ->orderby('total','desc')->take(2)->get();
    }
    public function getJobByIdRecruiter($id)
    {
        return $this->_job->where('id_user',$id)->get();
    }
    
    public function getJobTopViews($id_recruiter){
        return $this->_job->where('id_user',$id_recruiter)->orderby('job_view','desc')->take(3)->get();
    }

}