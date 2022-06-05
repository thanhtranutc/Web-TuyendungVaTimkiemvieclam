<?php

namespace App\Repositories;

use App\Models\favourite_job;


class JobfavoriteRepository
{

    protected $_favouriteJob;

    public function __construct(
        favourite_job $favouriteJob
    ) {
        $this->_favouriteJob = $favouriteJob;
    }

    public function delete($id,$user)
    {
        $job = $this->_favouriteJob->where('id_job',$id)->where('id_user',$user)->first();
        $job->delete();
    }
}
