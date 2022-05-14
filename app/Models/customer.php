<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'user_id', 'user_name', 'user_image', 'user_password', 'user_adress', 'user_email', 'user_phone'
    ];
    protected $primaryKey = 'user_id';
    protected $table = 'user';

    public function experience()
    {
        return $this->hasMany('App\Models\experience', 'user_id');
    }
    public function profile()
    {
        return $this->hasMany('App\Models\profile', 'user_id');
    }
    public function apply_job()
    {
        return $this->hasMany('App\Models\apply_job', 'user_id');
    }
    public function notification()
    {
        return $this->hasMany('App\Models\notification', 'user_id');
    }
    public function favourite_job()
    {
        return $this->hasMany('App\Models\favourite_job', 'user_id');
    }
    
}
