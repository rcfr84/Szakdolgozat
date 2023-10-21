<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'category_id';

    protected $fillable = [
        'category_id',
        'name',
    ];

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class, 'category_id', 'category_id');
    }
}
