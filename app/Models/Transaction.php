<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'Customer_ID',
        'Seller_ID',
        'Cash',


    ];
    public function Property()
    {
        return $this->belongsTo(Property::class,'id');
    }
}
