<?php

namespace App\Repositories;

use App\Models\apply_job;

class ApplyjobRepository {

    protected $_applyjob;


    public function __construct(apply_job $applyjob)
    {
        $this->_applyjob = $applyjob;
    }

    public function getAllApply(){
        return $this->_applyjob->all();
    }

    public function getCount()
    {

        return $this->getAllApply()->count();
    }
}