<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
   // public $timestamps = false;
    protected $fillable =
    [   'id',
        'UserId',
        'Country',
        'City'
        ,'Address'
];

}
