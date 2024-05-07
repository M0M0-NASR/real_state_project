<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailVerification extends Model
{
    protected $fillable = [
        'id',
         'UserId',
         'VerificationCode',
         'IsVerified',
         'created_at',
         'updated_at'

    ];
    use HasFactory;
}
