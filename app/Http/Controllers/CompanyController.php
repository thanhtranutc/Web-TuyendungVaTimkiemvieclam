<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company;
use App\Models\job;
use App\Models\job_detail;
use App\Repositories\CompanyRepository;
use App\Services\CompanyService;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    //

    protected $_companyRepository;
    protected $_companyService;

    public function __construct(
        CompanyRepository $companyRepository,
        CompanyService $companyService
    ) {
        $this->_companyRepository = $companyRepository;
        $this->_companyService = $companyService;
    }
    public function Security()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('admin.dashboard');
        } else {
            return Redirect::to('/')->send();
        }
    }
    public function list_company()
    {
        $this->Security();
        $data =  company::orderby('company_id')->paginate(6);
        return view('admin.listcompany')->with('data', $data);
    }
    public function add_company()
    {
        $this->Security();
        return view('admin.addcompany');
    }
    public function insert_company(Request $request)
    {
        $data = $request->all();
        $company = new company();
        $company->company_name = $data['company_name'];
        $company->company_staff = $data['company_staff'];
        $company->company_adress = $data['company_adress'];
        if ($data['company_status'] == 'Kích hoạt') {
            $company->company_status = '1';
        } else {
            $company->company_status = '2';
        }
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
    public function frontend_company()
    {
        $listcompany = $this->_companyRepository->getCompanyByOutstanding(1);
        return view('customer.company')->with('listcompany', $listcompany);
    }
    public function edit_page($id)
    {
        $company = company::where('company_id', $id)->first();
        Session::put('id_company', $company->company_id);
        return view('admin.editcompany')->with('company1', $company);
    }
    public function update_company($id, Request $request)
    {
        $data = $request->all();
        $company = company::where('company_id', $id)->first();
        $company->company_name = $data['company_name'];
        $company->company_adress = $data['company_adress'];
        $company->company_staff = $data['company_staff'];
        if ($data['company_status'] == 'Kích hoạt') {
            $company->company_status = '1';
        } else {
            $company->company_status = '2';
        }
        $company->company_desc = $data['company_desc'];

        $img_old = $data['img_old'];
        if (!empty($img_old)) {
            if ($request->hasFile('company_image')) {
                $get_image = $request->file('company_image');
                if ($get_image) {
                    $new_image_name = $get_image->getClientOriginalName();
                    $name_image = current(explode('.', $new_image_name));
                    $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                    $get_image->move('public/images/company', $new_image);
                    $data['company_image'] = $new_image;
                    $company->company_image = $data['company_image'];
                }
            } else {
                $company->company_image = $data['img_old'];
            }
        } else {
            $get_image = $request->file('company_image');
            if ($get_image) {
                $new_image_name = $get_image->getClientOriginalName();
                $name_image = current(explode('.', $new_image_name));
                $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move('public/images/company', $new_image);
                $data['company_image'] = $new_image;
                $company->company_image = $data['company_image'];
            }
        }
        $company->save();
        Session::put('message', 'Sửa thành công');

        return Redirect::to('/listcompany');
    }
    public function delete_company($id)
    {
        $company = company::where('company_id', $id)->first();
        if ($company) {
            $listJob = job_detail::where('id_company',$company->company_id)->get();
            foreach($listJob as $item){
                $job = job::where('job_id',$item->id_job)->first();
                $job->delete();
            }
            $company->delete();
            Session::put('message', "Xóa thành công !");
        } else {
            Session::put('message', "Không tìm thấy sản phẩm!");
        }
        return Redirect()->back();
    }
    public function showDetailCompany($id_company)
    {
        $listRelate = $this->_companyService->getJobRelateByCompany($id_company);
        $company = $this->_companyRepository->getCompanyById($id_company);
        return view('customer.DetailCompany')->with('company', $company)->with('listRelate',$listRelate);
    }

    public function searchCompany(Request $request)
    {
       $data_post  = $request->All();
       $resultSearch = $this->_companyService->searchCompany($data_post['keyword']);
       return view('customer.ResultSearchCompany')->with('resultSearch',$resultSearch);
    }
}
