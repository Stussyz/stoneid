<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyUserFavorite extends Model
{
    public function userProfile()
    {
        return $this->belongsTo(UserProfile::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
