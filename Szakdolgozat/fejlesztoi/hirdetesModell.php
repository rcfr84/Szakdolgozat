<?php
class Advertisement extends Model
{
    use HasFactory;

    protected $table = 'advertisements';
    protected $primaryKey = 'advertisement_id';

    protected $fillable = [
        'city_id',
        'category_id',
        'title',
        'price',
        'description',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    public function pictures()
    {
        return $this->hasMany(Picture::class, 'advertisement_id', 'advertisement_id');
    }
}
