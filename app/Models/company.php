<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'company_id', 'company_name', 'company_image', 'company_desc', 'company_adress', 'company_status','company_introduce','outstanding'
    ];
    protected $primaryKey = 'company_id';
    protected $table = 'company';

    public function detail_job()
    {
        return $this->hasMany('App\Models\job_detail', 'company_id');
    }
}
