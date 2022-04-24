<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'id_category', 'category_name', 'category_desc', 'category_status'
    ];
    protected $primaryKey = 'id_category';
    protected $table = 'category';

    public function job()
    {
        return $this->hasMany('App\Models\job', 'id_category');
    }
}
