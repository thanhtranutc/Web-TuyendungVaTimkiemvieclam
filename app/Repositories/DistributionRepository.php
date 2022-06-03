<?php

namespace App\Repositories;

use App\Models\distribution;

class DistributionRepository {

    protected $_distribution;


    public function __construct(distribution $distribution)
    {
        $this->_distribution = $distribution;
    }

    public function getAllDistribution(){
        return $this->_distribution->all();
    }
    public function getDistributionById($id)
    {
        return $this->_distribution->find($id);
    }

    
}