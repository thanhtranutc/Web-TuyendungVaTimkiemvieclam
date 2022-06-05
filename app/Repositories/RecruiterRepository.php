<?php

namespace App\Repositories;

use App\Models\admin;
use App\Models\detail_roles;


class RecruiterRepository
{


    protected $_admin;
    protected $_detailRoles;

    public function __construct(
        admin $admin,
        detail_roles $detailRoles
    ) {
        $this->_admin = $admin;
        $this->_detailRoles = $detailRoles;
    }

    public function create(array $attributes)
    {
        return $this->_admin->create($attributes);
    }

    public function getTotalRecruiter()
    {
        $recruiter = $this->_detailRoles->where('roles_id',2)->get();
        return count($recruiter);
    }
}
