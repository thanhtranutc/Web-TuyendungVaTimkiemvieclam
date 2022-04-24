<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\job;
use Illuminate\Support\Facades\Session;

class RecruiterController extends Controller
{
    public function list_jobpost()
    {
        $id = Session::get('admin_id');
        $job_post = job::where('id_user', $id)->orderby('job_id','asc')
        ->with('admin','category','distribution','working_format')
        ->get();
        if ($job_post) {
            return view('recruiter.list_post')->with('listjob',$job_post);
        }else{
        return null;
        }
    }
}
