<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id',
        'photo',
        'address',
        'favorites',
        'last_seen',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }
    public function favoriteProperties()
    {
        return $this->belongsToMany(Property::class, 'property_user_favorites')->withTimestamps();
    }

}
