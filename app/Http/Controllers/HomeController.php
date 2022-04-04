<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\distribution;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(){
        $city= distribution::orderby('id_distribution','asc')->take(3)->get();
        return view('customer.homepage')->with('city',$city);
    }
    public function login_customer(){
        return view('customer.login');
    }
    public function register_customer(){
        return view('customer.register');
    }
    public function logout(){
        Session::flush();
        $city= distribution::orderby('id_distribution','asc')->take(3)->get();
        return view('customer.homepage')->with('city',$city);
    }
}
