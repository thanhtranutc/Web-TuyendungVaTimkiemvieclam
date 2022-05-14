<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'id','id_user','id_recruiter','id_job','notification_status','notification_title','notification_content','notification_date'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'notification';
    public function job(){
        return $this->belongsTo('App\Models\job','id_job');
    }
    public function customer(){
        return $this->belongsTo('App\Models\customer','id_user');
    }
    public function admin(){
        return $this->belongsTo('App\Models\admin','id_recruiter');
    }

    public function checkNotification($user, $job){
        return notification::where('id_user',$user)->where('id_job',$job)->first();
    }
}
