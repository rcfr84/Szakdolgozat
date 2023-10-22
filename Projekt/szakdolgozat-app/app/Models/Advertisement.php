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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'city_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function mobile_numbers()
    {
        return $this->belongsTo(MobileNumber::class, 'mobile_number_id', 'mobile_number_id');
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class, 'advertisement_id', 'advertisement_id');
    }
}
