<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apply_job extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'id_apply_job', 'id_job','id_user','create_at'
    ];
    protected $primaryKey = 'id_apply_job';
 	protected $table = 'apply_job';
    public function customer(){
        return $this->belongsTo('App\Models\customer','id_user');
    }
    public function job(){
        return $this->belongsTo('App\Models\job','id_job');
    }
}
