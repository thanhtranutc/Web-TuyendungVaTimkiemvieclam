<?php

namespace App\Services;

use App\Repositories\CompanyRepository;
use App\Repositories\JobRepository;

class CompanyService {

    protected $_companyRepository;
    protected $_jobRepository;


    public function __construct(
        CompanyRepository $companyRepository,
        JobRepository $jobRepository)
    {
        $this->_companyRepository = $companyRepository;
        $this->_jobRepository = $jobRepository;
    }
    

    public function getJobRelateByCompany($id_category)
    {
        $jobRelate = array();
        $jobDetail = $this->_jobRepository->getJobDetailByCompanyid($id_category);
        foreach($jobDetail as $item){
            $job = $this->_jobRepository->getJobById($item->id_job);
            $jobRelate[]= $job;
        }
        return $jobRelate;
    }
}