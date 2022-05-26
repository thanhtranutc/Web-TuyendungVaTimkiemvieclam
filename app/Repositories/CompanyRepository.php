<?php

namespace App\Repositories;

use App\Models\company;

class CompanyRepository {

    protected $_company;


    public function __construct(company $company)
    {
        $this->_company = $company;
    }

    public function getCompanyById($id){
        return $this->_company->find($id);
    }

    public function getCompanyByOutstanding($condition){
        return $this->_company->where('outstanding',$condition)->take(4)->get();
    }

    public function getCompanyByName($name){
        return $this->_company->where('company_name', 'LIKE', '%' . $name. '%')->get();
    }
}