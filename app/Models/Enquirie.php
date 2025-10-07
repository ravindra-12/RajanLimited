<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquirie extends Model
{
    use HasFactory;

    protected $table = 'enquiries';

    protected $fillable = [
        'firsname',
        'lastname',
        'company',
        'email',
        'phoneno',
        'servicerequest',
        'comments'
    ];

}
