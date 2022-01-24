<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'company_id', 'company_name','company_image','company_desc','company_adress','company_status'
    ];
    protected $primaryKey = 'company_id';
 	protected $table = 'company';

    //  public function product(){
    //     return $this->hasMany('App\Models\product','MaNCC','MaNCC');
    // }
}
