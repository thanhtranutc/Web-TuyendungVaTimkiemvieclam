<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_roles extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'id_detail_roles', 'roles_id', 'admin_id'
    ];
    protected $primaryKey = 'id_detail_roles';
    protected $table = 'detail_roles';

    public function admin()
    {
        return $this->belongsTo('App\Models\admin', 'admin_id');
    }
    public function roles()
    {
        return $this->belongsTo('App\Models\roles', 'roles_id');
    }
}
