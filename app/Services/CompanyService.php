<?php

namespace App\Services;

use App\Repositories\CompanyRepository;
use App\Repositories\JobRepository;
use App\Repositories\DistributionRepository;

class CompanyService
{

    protected $_companyRepository;
    protected $_jobRepository;
    protected $_distributionRepository;


    public function __construct(
        CompanyRepository $companyRepository,
        DistributionRepository $distributionRepository,
        JobRepository $jobRepository
    ) {
        $this->_companyRepository = $companyRepository;
        $this->_jobRepository = $jobRepository;
        $this->_distributionRepository = $distributionRepository;
    }


    public function getJobRelateByCompany($id_category)
    {
        $jobRelate = array();
        $jobDetail = $this->_jobRepository->getJobDetailByCompanyid($id_category);
        foreach ($jobDetail as $item) {
            $job = $this->_jobRepository->getJobById($item->id_job);
            $jobRelate[] = $job;
        }
        return $jobRelate;
    }

    public function searchCompany($keyword)
    {
        if (!empty($keyword)) {
            $company = $this->_companyRepository->getCompanyByName($keyword);
            return $company;
        }
    }
    
    
}
