<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileNumber extends Model
{
    use HasFactory;

    protected $table = 'mobile_numbers';
    protected $primaryKey = 'mobile_numbers_id';

    protected $fillable = [
        'mobile_numbers_id',
        'advertisements_id',
    ];
}
