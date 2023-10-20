<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $table = 'pictures';
    protected $primaryKey = 'picture_id';

    protected $fillable = [
        'picture_id',
        'src',
    ];
}
