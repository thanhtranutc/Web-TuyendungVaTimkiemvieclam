<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\profile;
use App\Models\apply_job;
use App\Models\favourite_job;
use App\Models\social;
use App\Repositories\JobfavoriteRepository;
use App\Services\CustomerService;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Mail;
// use Illuminate\Support\Facades\Auth;
use App\Models\customer as ModelsCustomer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    protected $_jobfavoriteRepository;
    protected $_customerService;

    public function __construct(
        JobfavoriteRepository $jobfavoriteRepository,
        CustomerService $customerService
    ) {
        $this->_jobfavoriteRepository = $jobfavoriteRepository;
        $this->_customerService = $customerService;
    }
    // Đăng nhập khách hàng
    public function login(Request $request)
    {
        $validate = $request->validate([
            'user_email' => ['required'],
            'user_password' => ['required'],
        ]);
        $email = $validate['user_email'];
        $password = md5($validate['user_password']);
        $user = customer::where('user_email', $email)->where('user_password', $password)->first();
        if ($user) {
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
    public function add_user(Request $request)
    {
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
    public function profile()
    {
        $id_user = Session::get('user_id');
        $data = customer::where('user_id', $id_user)->first();
        $list_experience = $this->_customerService->getListExperienceByUserId($id_user);
        return view('customer.profile', ['list_experience' => $list_experience])->with('user', $data);
    }
    public function login_after_apply()
    {
        Session::put('notifi', 'Bạn cần đăng nhập để có thể ứng tuyển công việc!');
        return Redirect::to('/login_customer');
    }
    public function apply_job($id_job)
    {
        $userCurrent = Session::get('user_id');
        $profile_user = profile::where('id_user', $userCurrent)->first();
        if ($profile_user) {
            $is_applyjob = apply_job::where('id_job', $id_job)->where('id_user', $profile_user['id_user'])->first();

            if ($is_applyjob) {
                Session::put('notifi', 'Bạn đã ứng tuyển công việc này trước đó !');
            } else {
                $apply_job = new apply_job();
                $apply_job->id_user = $userCurrent;
                $apply_job->id_job = $id_job;
                $apply_job->create_at = Carbon::now('y m d');
                $apply_job->save();
                Session::put('notifi', 'Bạn đã ứng tuyển công việc thành công !');
            }
        } else {
            Session::put('notifi', 'Bạn cần tạo hồ sơ để có thể ứng tuyển!');
        }
        return Redirect()->back();
    }
    public function save_profile($id_user, Request $request)
    {
        $data = $request->all();

        // print_r($data['count_experien']);die;
        // insert experience table
        $this->_customerService->insertExperience($request, $id_user);

        // get image user
        $get_image = $request->file('user_image');
        if ($get_image) {
            $new_image_name = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $new_image_name));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/images/user', $new_image);
            $data['user_image'] = $new_image;
        }
        $userCurrent = customer::where('user_id', $id_user)->first();
        if ($userCurrent) {
            $userCurrent->user_name = $data['user_name'];
            $userCurrent->user_phone = $data['user_sdt'];
            $userCurrent->user_adress = $data['user_adress'];
            if (isset($data['user_image'])) {
                $userCurrent->user_image = $data['user_image'];
            }
            $userCurrent->update();
        }

        // insert profile table
        $id_user = Session::get('user_id');
        $isProfile  = $this->getProfileByIdUser($id_user);
        if ($isProfile) {
            $isProfile->profile_skill = $data['user_skill'];
            $isProfile->profile_education = $data['univerity'];
            $isProfile->profile_link = $data['user_link'];
            $isProfile->profile_career_goals = $data['career_goals'];
            $isProfile->update();
        } else {
            $new_profile = new profile();
            $new_profile->profile_skill = $data['user_skill'];
            $new_profile->id_user = $id_user;
            $new_profile->profile_title = 'test';
            $new_profile->profile_education = $data['univerity'];
            $new_profile->profile_link = $data['user_link'];
            $new_profile->profile_interest = 'test';
            $new_profile->profile_career_goals = $data['career_goals'];
            $new_profile->save();
        }




        Session::put('notifi', 'Cập nhật thành công !');
        return Redirect()->back();
    }
    public function getProfileByIdUser($id)
    {
        $profile = profile::where('id_user', $id)->first();
        return $profile;
    }
    public function getUserById($id)
    {
        return customer::find($id);
    }

    public function addJobToFavourite(Request $request)
    {
        $data_post = $request->all();
        $user = Session::get('user_id');
        $favourite_job = new favourite_job();
        $favourite_job->id_user = $user;
        $favourite_job->id_job = $data_post['id_job'];
        $favourite_job->save();
    }

    public function deleteJobFavorite($id)
    {
        $userCurrent = Session::get('user_id');
        $this->_jobfavoriteRepository->delete($id, $userCurrent);
        return redirect()->back();
    }

    public function loginFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function callbackFacebook()
    {
        $provider = Socialite::driver('facebook')->user();
        $account = social::where('provider', 'facebook')->where('provider_user_id', $provider->getId())->first();

        if ($account) {
            $account_name = customer::where('user_id', $account->user)->first();
            Session::put('user_name', $account_name->user_name);
            Session::put('user_id', $account_name->user_id);
            return Redirect::to('/');
        } else {
            $newAcountSocial = new social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook',
            ]);

            $checkEmail = customer::where('user_email', $provider->getEmail())->first();

            if (!$checkEmail) {
                $checkEmail = customer::create([
                    'user_name' => $provider->getName(),
                    'user_email' => $provider->getEmail(),
                    'user_password' => ''
                ]);
            }
            $newAcountSocial->customer()->associate($checkEmail);
            $newAcountSocial->save();

            $socialLogin = customer::find($account->user);
            Session::put('user_name', $socialLogin->user_name);
            Session::put('user_id', $socialLogin->user_id);
            return Redirect('/');
        }
    }

    public function forgetPassword(Request $request)
    {
        $data = $request->all();
        $title = "Đặt lại mật khẩu của bạn";
        Mail::send('email.form', compact('title'), function ($email) {
            $email->to('xin1nucuoi2820@gmail.com', 'test thui');
        });
    }
}
