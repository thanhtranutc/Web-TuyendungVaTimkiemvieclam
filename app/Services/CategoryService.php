<?php

namespace App\Services;

use App\Repositories\JobRepository;
use App\Repositories\CategoryRepository;

class CategoryService
{

    protected $_jobRepository;
    protected $_categoryRepository;


    public function __construct(
        CategoryRepository $categoryRepository,
        JobRepository $jobRepository
    ) {
        $this->_jobRepository = $jobRepository;
        $this->_categoryRepository = $categoryRepository;
    }


    public function getTopCategory()
    {
        $topCategory = array();
        $groupCategory = $this->_jobRepository->getGroupJobByCategory();
        foreach ($groupCategory as $item) {
            $category = $this->_categoryRepository->getCategoryById($item->id_category);
            $topCategory[] = $category;
        }
        return $topCategory;
    }
}
