<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\admin;
use App\Models\roles;

class DetailRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = roles::where('roles_name','admin')->first();
        $tuyendung = roles::where('roles_name','tuyendung')->first();

        $tuyendung_roles = admin::create([
            'admin_name' => 'Thanh',
            'admin_email'=> 'thanh@gmail.com',
            'admin_password'=> md5('123456'),
            'admin_adress'=>'',
            'admin_image'=>''
        ]);
        $tuyendung_roles-> roles()->attack($tuyendung);
    }
}
