<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected $table = 'advertisements';
    protected $primaryKey = 'advertisement_id';

    protected $fillable = [
        'advertisement_id',
        'user_id',
        'city_id',
        'category_id',
        'title',
        'price',
    ];
}
