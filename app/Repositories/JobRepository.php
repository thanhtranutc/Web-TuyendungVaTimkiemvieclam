<?php

namespace App\Repositories;

use App\Models\job;

class JobRepository {

    protected $_job;


    public function __construct(job $job)
    {
        $this->_job = $job;
    }

    public function getAllJob(){
        return $this->_job->all();
    }

    public function getCountTotalJob(){
        return count($this->getAllJob());
    }
}