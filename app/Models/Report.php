<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;










//***********************Relations************************

    public function ReporterUser (){
        return $this->belongsTo(UserInfo::class,'Reporter_ID');
    }
    public function ReportedUser (){
        return $this->belongsTo(UserInfo::class,'Reported_ID');
    }
}
