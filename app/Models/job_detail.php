<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job_detail extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'id_detail_job', 'id_company', 'id_job', 'detail_job_desc', 'detail_job_request', 'detail_job_salary', 'detail_job_status', 'detail_job_duration'
    ];
    protected $primaryKey = 'id_detail_job';
    protected $table = 'detail_job';

    public function company()
    {
        return $this->belongsTo('App\Models\company', 'id_company');
    }
    public function job(){
        return $this->belongsTo('App\Models\job','id_job');
    }
}
