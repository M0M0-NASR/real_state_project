<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [

        'user_id',
        'property_id',
        'stars',
        'comment',

    ];

    protected function UserReview()
    {
    return $this->belongsTo(UserInfo::class,'user_id');
    }
    protected function ReviewedProperty()
    {
        return $this ->belongsTo(Property::class,'property_id');
    }
}
