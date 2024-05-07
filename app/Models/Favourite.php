<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;














    //******************** Relations *****************************/
    protected function FavouriteProperties (){
        return $this->belongsTo(Property::class,'Favourite_property_id');
    }
}


