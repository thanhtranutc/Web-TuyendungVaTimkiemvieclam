<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apply_job extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'id_apply_job', 'id_job','id_profile'
    ];
    protected $primaryKey = 'id_apply_job';
 	protected $table = 'apply_job';
    public function profile(){
        return $this->belongsTo('App\Models\profile','id_profile');
    }
    public function job(){
        return $this->belongsTo('App\Models\job','id_job');
    }
}
