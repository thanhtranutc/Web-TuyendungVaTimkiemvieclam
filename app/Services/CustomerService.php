<?php

namespace App\Services;

use App\Models\experience;

class CustomerService
{

    protected $_experience;


    public function __construct(
        experience $experience
    ) {
        $this->_experience = $experience;
    }

    public function insertExperience($request,  $id_user)
    {
        $data = $request;
        $count = $data['count_experien'];
        if($count > 0 ){
            for($i = 1; $i<= $count;$i++){
                $experience = new experience();
                $experience->experience_title = $data['experience_title'.$i];
                $experience->experience_desc = $data['experience_desc'.$i];
                $experience->experience_start = $data['time_start'.$i];
                $experience->experience_end = $data['time_end'.$i];
                $experience->id_user = $id_user;
                $experience->save();
            }
        }
    }

    public function getListExperienceByUserId($id){
        return $this->_experience->where('id_user',$id)->get();
    }

}
