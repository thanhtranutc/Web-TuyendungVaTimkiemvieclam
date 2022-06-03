<?php

namespace App\Repositories;

use App\Models\admin;


class RecruiterRepository {

    
protected $_admin;

    public function __construct(admin $admin)
    {
        $this->_admin = $admin;
    }

  public function create(array $attributes){
      return $this->_admin->create($attributes);
  }

}