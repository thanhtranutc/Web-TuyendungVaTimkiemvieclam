<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'id_roles', 'roles_name'
    ];
    protected $primaryKey = 'id_roles';
 	protected $table = 'roles';

     public function detail_roles(){
        return $this->hasMany('App\Models\detai_roles','roles_id');
    }
}
