<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'id_admin', 'admin_name', 'admin_email', 'admin_password', 'admin_phone', 'admin_adress', 'admin_image'
    ];
    protected $primaryKey = 'id_admin';
    protected $table = 'admin';

    public function job()
    {
        return $this->hasMany('App\Models\job', 'id_admin');
    }

    public function detail_roles()
    {
        return $this->hasMany('App\Models\detail_roles', 'admin_id');
    }
    public function hasAnyRoles($roles)
    {
        return null !== $this->detail_roles()->where('roles_name', $roles)->first();
    }
    public function hasRoles($roles)
    {
        return null !== $this->detail_roles()->where('roles_id', $roles)->first();
    }
    public function notification()
    {
        return $this->hasMany('App\Models\notification', 'id_admin');
    }
}
