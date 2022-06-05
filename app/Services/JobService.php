<?php

namespace App\Services;

use App\Repositories\JobRepository;

class JobService
{

    protected $_jobRepository;
    protected $_distributionRepository;


    public function __construct(
        JobRepository $jobRepository
    ) {
        $this->_jobRepository = $jobRepository;
    }

    public function cancelJob($id)
    {  
        return $this->_jobRepository->update($id,array('job_status'=>4));
    }
    public function deleteJob($id)
    {  
        return $this->_jobRepository->update($id,array('job_status'=>5));
    }

    public function updateViewJob($id)
    {
        $job = $this->_jobRepository->getJobById($id);
        $jobview = $job['job_view']+1;
        return $this->_jobRepository->update($id,array('job_view'=>$jobview));
    }

   
}
