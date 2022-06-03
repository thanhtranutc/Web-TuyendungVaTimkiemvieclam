<?php

namespace App\Services;

use App\Repositories\JobRepository;
use App\Repositories\DistributionRepository;

class DistributionService
{

    protected $_jobRepository;
    protected $_distributionRepository;


    public function __construct(
        DistributionRepository $distributionRepository,
        JobRepository $jobRepository
    ) {
        $this->_jobRepository = $jobRepository;
        $this->_distributionRepository = $distributionRepository;
    }


    public function getTopDistribution()
    {
        $topDistribution = array();
        $groupDistribution = $this->_jobRepository->getGroupJobByDistribution();
        foreach ($groupDistribution as $item) {
            $distribution = $this->_distributionRepository->getDistributionById($item->id_distribution);
            $topDistribution[] = $distribution;
        }
        return $topDistribution;
    }
}
