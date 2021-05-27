<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'shopname',
        'acount_holder',
        'acount_number',
        'acount_number',
        'bank_name',
        'bank_branch',
        'photo',
        'city',
    ];
}
