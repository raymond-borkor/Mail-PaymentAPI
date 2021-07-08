<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendMail extends Model
{
    use HasFactory;

    protected $table = "sendemail";


    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'message'
    ];


}
