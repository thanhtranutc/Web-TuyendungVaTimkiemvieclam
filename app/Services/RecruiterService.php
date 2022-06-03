<?php

namespace App\Services;

use App\Repositories\RecruiterRepository;
use Illuminate\Support\Facades\Session;

class RecruiterService
{

    protected $_recruiterRepository;

    public function __construct(
        RecruiterRepository $recruiterRepository
    ) {
        $this->_recruiterRepository = $recruiterRepository;
    }

    public function saveRecruiter($request)
    {
        $validateData = $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required|min:8',
            'repassword' => 'required|same:password',
        ]);

        $messenger = [
            'required' => ':attribute Không được để trống',
            'min' => ':attribute Không được nhỏ hơn :min ký tự',
            'max' => ':attribute Không được lớn hơn :max ký tự',
        ];
        $recruiterAccount = array();
        $recruiterAccount['admin_name'] = $validateData['name'];
        $recruiterAccount['admin_email'] = $validateData['email'];
        $recruiterAccount['admin_password'] = md5($validateData['password']);
        $recruiterAccount['admin_status']  = 0;

        $recruiterAccount=$this->_recruiterRepository->create($recruiterAccount);
    }
}
