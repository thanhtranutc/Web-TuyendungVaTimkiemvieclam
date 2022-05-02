<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class experience extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'id_experience', 'experience_title','experience_desc','id_user','experience_start','experience_end'
    ];
    protected $primaryKey = 'id_experience';
 	protected $table = 'experience';

    public function customer(){
        return $this->belongsTo('App\Models\customer','id_user');
    }

    public function profile()
    {
        return $this->hasMany('App\Models\profile', 'id_experience');
    }
   
}
