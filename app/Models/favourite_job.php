<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favourite_job extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'id','id_user','id_job'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'favourite_job';
    public function job(){
        return $this->belongsTo('App\Models\job','id_job');
    }
    public function customer(){
        return $this->belongsTo('App\Models\customer','id_user');
    }

    public function isFavouriteJob($user, $job){
        $list = favourite_job::where('id_user',$user)->where('id_job',$job)->first();
        if($list){
            return $list;
        }else{
            return null;
        }
    }
    public function getFavouriteJobByIdUser($user)
    {
        return favourite_job::where('id_user',$user)->paginate(3);
    }
}
