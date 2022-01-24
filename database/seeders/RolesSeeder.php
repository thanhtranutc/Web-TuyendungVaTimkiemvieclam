<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;     
use App\Models\roles;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        roles::create(['roles_name'=>'admin']);
        roles::create(['roles_name'=>'tuyendung']);
        roles::create(['roles_name'=>'ungvien']);

    }
}
