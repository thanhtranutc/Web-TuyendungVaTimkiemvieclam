<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class working_format extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'id_working_format', 'working_format_name','working_format_status'
    ];
    protected $primaryKey = 'id_working_format';
 	protected $table = 'working_format';
    public function job(){
        return $this->hasMany('App\Models\job','id_working_format');
    }
    public function getListWorkingFormat(){
        return working_format::orderby('id_working_format','asc')->get();
    }
}
