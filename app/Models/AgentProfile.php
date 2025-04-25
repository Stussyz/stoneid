<?php
namespace App\Models;

use App\Models\ListingRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class AgentProfile extends Model
{
    protected $fillable = [
        'user_id', 'NIB', 'address', 'photo', 'bio', 'level', 'milestones', 'awards',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function listingRequests()
    {
        return $this->hasMany(ListingRequest::class);
    }
    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }
    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
