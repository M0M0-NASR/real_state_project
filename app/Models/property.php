<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class property extends Model
{
    use HasFactory;
    //public $timestamps = false;
    protected $fillable = [
        'id',
        'TypeID',
        'PublisherType',
        'Publisher_id',
        'location',
        'Description',
        'Area',
        'price',
        'Bedrooms',
        'Bathrooms',
        'Property_Image',
        'Phone'

    ];

    ########################     relations #########################
    protected function PropertyType ()
    {
        return $this->hasOne(Type::class,'Type_ID','TypeID');
    }
    protected function PropertyPublisher()
    {
        return $this->belongsTo(UserInfo::class,'Publisher_id');
    }
    protected function Transaction()
    {
        return $this->hasOne(Transaction::class,'Property_ID');
    }
}
