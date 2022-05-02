<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'id_profile', 'id_user','profile_skill','profile_title','profile_education','profile_link','profile_interest','profile_career_goals'
    ];
    protected $primaryKey = 'id_profile';
 	protected $table = 'profile';
    public function customer(){
        return $this->belongsTo('App\Models\customer','id_user');
    }
    public function apply_job()
    {
        return $this->hasMany('App\Models\apply_job', 'id_profile');
    }
}
