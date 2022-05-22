<?php

namespace App\Repositories;

use App\Models\working_format;

class WorkingformatRepository {

    protected $_workingformat;


    public function __construct(working_format $workingformat)
    {
        $this->_workingformat = $workingformat;
    }

    public function getAllWorkingformat(){
        return $this->_workingformat->all();
    }
}