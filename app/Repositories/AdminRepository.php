<?php

namespace App\Repositories;

use App\Models\admin;

class AdminRepository {

    protected $_admin;


    public function __construct(admin $admin)
    {
        $this->_admin = $admin;
    }

    public function deleteUser($id){
        $result = $this->_admin->find($id);
        if ($result) {
            $result->delete();

            return true;
        }
        return false;
    }

}