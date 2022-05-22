<?php

namespace App\Services;

use App\Repositories\CompanyRepository;

class CompanyService {

    protected $_companyRepository;


    public function __construct(CompanyRepository $companyRepository)
    {
        $this->_companyRepository = $companyRepository;
    }
    
}