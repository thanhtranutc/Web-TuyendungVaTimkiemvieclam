<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\profile;
use App\Models\apply_job;
use App\Models\customer as ModelsCustomer;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    // Đăng nhập khách hàng
    public function login(Request $request){
        $validate = $request->validate([
        'user_email' => ['required'],
        'user_password' => ['required'],
        ]);
        $email = $validate['user_email'];
        $password = md5($validate['user_password']);
        $user = customer::where('user_email',$email)->where('user_password',$password)->first();
        if($user){
            $login_count = $user->count();
            if ($login_count > 0) {
                Session::put('user_email', $user->user_email);
                Session::put('user_name', $user->user_name);
                Session::put('user_id', $user->user_id);
                return Redirect::to('/');
            }
        } else {
            Session::put('message', 'Mật khẩu hoặc tài khoản bị sai.Làm ơn nhập lại !');
            return Redirect::to('/login_customer');
        }

    }
    // Thêm tài khoản đăng ký tới database
    public function add_user(Request $request){
        // $data = $request->all();
        $validatedData = $request->validate([
            'user_email' => 'required|email',
            'user_name' => 'required',
            'user_password' => 'required|min:8',
            're_password' => 'required|same:user_password',
        ]);

        // $messenger = [
        //     'required' => ':attribute Không được để trống',
        //     'min' => ':attribute Không được nhỏ hơn :min ký tự',
        //     'max' => ':attribute Không được lớn hơn :max ký tự',
        //  ];
        
        $data = $request->all();
        $customer = new customer();

        $customer->user_email = $validatedData['user_email'];
        $customer->user_name = $validatedData['user_name'];
        $customer->user_password = md5($validatedData['user_password']);
        $customer->save();
        // $customer_id = $customer->MaKH;
        // Session::put('customer_id', $customer_id);
        Session::put('message', 'Đăng kí tài khoản thành công !');
        // Session::put('cutomer_name', $request->cutomer_name);
        return Redirect()->back();
    }
    // Xây dựng hồ sơ
    public function profile(){
        $id_user = Session::get('user_id');
        $data = customer::where('user_id',$id_user)->first();
        return view('customer.profile')->with('user',$data);
    }
    public function login_after_apply(){
        Session::put('notifi', 'Bạn cần đăng nhập để có thể ứng tuyển công việc!');
        return Redirect::to('/login_customer');
    }
    public function apply_job($id_user,$id_job){
        $profile_user = profile::where('id_user',$id_user)->first();
        if($profile_user){
            $is_applyjob = apply_job::where('id_job',$id_job)->where('id_profile',$profile_user['id_profile'])->first();
            if($is_applyjob){
                Session::put('notifi', 'Bạn đã ứng tuyển công việc này trước đó');
            }else{
            $apply_job = new apply_job();
            $apply_job->id_profile = $profile_user['id_profile'];
            $apply_job->id_job = $id_job;
            $apply_job->save();
            Session::put('notifi', 'Bạn đã ứng tuyển công việc');
            }
        }
        else{
            Session::put('notifi', 'Bạn cần tạo hồ sơ để có thể ứng tuyển!');
        }
        return Redirect()->back();

    }
    public function save_profile($id_user,Request $request){
        $data = $request->all();
        //update date user table

        $userCurrent = customer::where('user_id',$id_user)->first();
        if($userCurrent){
            $userCurrent->user_name = $data['user_name'];
            $userCurrent->user_phone = $data['user_sdt'];
            $userCurrent->user_adress = $data['user_adress'];
            $userCurrent->update();
        }

    }
}
