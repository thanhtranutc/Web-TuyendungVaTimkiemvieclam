<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin;
use App\Models\roles;
use App\Models\category;
use App\Models\detail_roles;
use App\Repositories\UserRepository;
use App\Repositories\JobRepository;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Component\Console\Input\Input;

class AdminController extends Controller
{
    protected $_userRepository;
    protected $_jobRepository;

    public function __construct(
        UserRepository $userRepository,
        JobRepository $jobRepository
    ) {
        $this->_userRepository = $userRepository;
        $this->_jobRepository = $jobRepository;
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
    public function index()
    {
        return view('admin.login');
    }
    public function dashboard()
    {
        $this->Security();
        $countJob = $this->_jobRepository->getCountTotalJob();
        $countUser = $this->_userRepository->getCountTotalUser();
        return view('admin.dashboard')->with('countJob',$countJob)->with('countUser',$countUser);
    }
    public function login(Request $request)
    {
        $validate = $request->validate([
            //validation laravel 
            'email' => ['required'],
            'password' => ['required'],
        ]);
        $email_admin = $validate['email'];
        $password_admin = md5($validate['password']);
        $data = admin::where('admin_email', $email_admin)->where('admin_password', $password_admin)->first();

        // $roles = detail_roles::where('admin_id', $data->id_admin)->get();
        // foreach ($roles as $value) {
        //     if ($value->roles_id == 1) {
        //         Session::put('roles_admin', 'Quyền admin');
        //     }
        // }
        // login
        if ($data) {
            $login_count = $data->count();
            if ($login_count > 0) {
                // Kiểm tra quyền admin
                $roles = detail_roles::where('admin_id', $data->id_admin)->get();
                foreach ($roles as $value) {
                    if ($value->roles_id == 1) {
                        Session::put('roles_admin', 'Quyền admin');
                    }
                }
                Session::put('admin_email', $data->email);
                Session::put('admin_id', $data->id_admin);
                Session::put('admin_name', $data->admin_name);
                return Redirect::to('/dashboard');
            }
        } else {
            Session::put('message', 'Mật khẩu hoặc tài khoản bị sai.Làm ơn nhập lại !');
            return Redirect::to('/admin');
        }
    }
    public function list_user()
    {
        $this->Security();
        $data = admin::with('detail_roles')->orderby('id_admin', 'desc')->get();
        return view('admin.listuser')->with('data', $data);
    }
    public function logout()
    {
        // $this-> Security();
        // Session::put('admin_email', NULL);
        // Session::put('admin_id', NULL);
        // Session::put('admin_name', NULL);
        Session::flush();
        return Redirect::to('/admin');
    }
    public function update_roles(Request $request, $id_admin)
    {
        // $data = $request->all();
        $data = detail_roles::where('admin_id', $id_admin)->first();
        foreach ($data as $value) {
            if ($request->Input['admin_roles'] == false) {
                // $data = detail_roles::where('admin_id', $id_admin)->first();
                $data->roles_id = $request->admin_roles;
                $data->save();
            }
        }
        return Redirect::to('/listuser');
    }
    public function profile()
    {
        return view('admin.user.profile');
    }
}
