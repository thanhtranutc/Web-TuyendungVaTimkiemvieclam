<?php

namespace App\Repositories;

use App\Models\category;

class CategoryRepository {

    protected $_category;


    public function __construct(category $category)
    {
        $this->_category = $category;
    }

    public function getAllCategory(){
        return $this->_category->all();
    }
}