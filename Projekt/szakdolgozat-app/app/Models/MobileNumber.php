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
        'number',
    ];

    public function advertisements()
    {
        return $this->belongsToMany(Advertisement::class, 'advertisement_mobile_number', 'mobile_number_id', 'advertisement_id');
    }
}
