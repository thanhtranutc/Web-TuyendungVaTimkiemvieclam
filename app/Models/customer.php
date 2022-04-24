<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'user_id', 'user_name', 'user_image', 'user_password', 'user_adress', 'user_email', 'user_phone'
    ];
    protected $primaryKey = 'user_id';
    protected $table = 'user';
}
