<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Property;

class Rent extends Model
{
    use HasFactory;
    protected $fillable = [
        'Rent_id',
        'user_id',
        'Property_ID',
        'Rent_date',
        'Rent_period',
        'cash',

    ];

    public function user (){
        return $this->belongsTo(UserInfo::class,'user_id');
    }
    public function RentProperty()
    {
        return $this->belongsTo(Property::class,'Property_id');
    }
}
