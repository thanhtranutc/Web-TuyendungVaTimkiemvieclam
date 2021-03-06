<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class distribution extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'id_distribution', 'distribution_name'
    ];
    protected $primaryKey = 'id_distribution';
 	protected $table = 'distribution';

    public function job(){
        return $this->hasMany('App\Models\job','id_distribution');
    }

    public function getListDistribution(){
        return distribution::orderby('id_distribution')->get();
    }
}
