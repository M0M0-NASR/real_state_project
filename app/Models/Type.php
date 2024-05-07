<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Property;

class Type extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'Type_ID',
        'Type_name'
    ];
    // *********************************** Relations *********************************
public function TypeofProperty(){
return $this->belongsTo(Property::class,'TypeID','Type_ID');
}
}
