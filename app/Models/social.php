<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class social extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'id_user', 'user','provider','provider_user_id'
    ];
    protected $primaryKey = 'id_user';
 	protected $table = 'social';

     public function customer(){
        return $this->belongsTo('App\Models\customer','user');
    }
}