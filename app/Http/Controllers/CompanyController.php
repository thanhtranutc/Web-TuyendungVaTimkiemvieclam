<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    //
    public function Security(){
        $admin_id= Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin.dashboard');
        }
        else{
           return Redirect::to('/')->send();  
        }
    }
    public function list_company()
    {
        $this-> Security();
        $data =  company::orderby('company_id')->get();
        return view('admin.listcompany')->with('data', $data);
    }
    public function add_company()
    {
        $this-> Security();
        return view('admin.addcompany');
    }
    public function insert_company(Request $request)
    {
        $data = $request->all();
        $company = new company();
        $company->company_name = $data['company_name'];
        $company->company_adress = $data['company_adress'];
        $company->company_status = $data['company_status'];
        $company->company_desc = $data['company_desc'];
        $get_image = $request->file('company_image');
        if ($get_image) {
            $new_image_name = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $new_image_name));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/images/company', $new_image);
            $data['company_image'] = $new_image;
        }
        $company->company_image = $data['company_image'];
        $company->save();
        Session::put('message', 'Thêm thành công');

        return Redirect()->back();
    }
    public function frontend_company(){
        return view('customer.company');
    }
    
}
