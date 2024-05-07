<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'username',
        'email',
        'password',
        'Role'
    ];
    public $timestamps = false;
//**************************** relations ********************
protected function Rent (){
    return $this->hasMany(Rent::class,'user_id');
}
protected function Favourites (){
    return $this->hasMany(Favourite::class,'user_id');
}
protected function UserReviews (){
    return $this->hasMany(Review::class,'user_id');
}
protected function UserAddress (){
    return $this->hasOne(Address::class,'UserId');
}
protected function UserProfileInfo (){
    return $this->hasOne(ProfileInfo::class,'ProfileOwner');
}
protected function EmailVerify (){
    return $this->hasOne(EmailVerification::class,'UserId');
}
}
