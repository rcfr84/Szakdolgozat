<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';
    protected $primaryKey = 'city_id';

    protected $fillable = [
        'county_id',
        'name',
    ];

    public function county()
    {
        return $this->belongsTo(County::class, 'county_id', 'county_id');
    }
}
