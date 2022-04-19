<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'job_id', 'job_desc','id_user','id_category','job_date','job_status','id_distribution','id_working_format'
    ];
    protected $primaryKey = 'job_id';
 	protected $table = 'job';
    public function distribution(){
        return $this->belongsTo('App\Models\distribution','id_distribution');
    }
    public function working_format(){
        return $this->belongsTo('App\Models\working_format','id_working_format');
    }
    public function detail_job()
    {
        return $this->hasMany('App\Models\job_detail', 'job_id');
    }
}