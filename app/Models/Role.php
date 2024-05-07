<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;









    //********************************              relations          **************************************
    protected function User()
{
    return $this->belongsTo(UserInfo::class,'user_id');
}
}
