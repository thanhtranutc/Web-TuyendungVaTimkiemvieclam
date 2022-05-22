<?php

namespace App\Repositories;

use App\Models\customer;

class UserRepository {

    protected $_user;


    public function __construct(customer $user)
    {
        $this->_user = $user;
    }

    public function getAllUser(){
        return $this->_user->all();
    }

    public function getCountTotalUser(){
        return count($this->getAllUser());
    }
}