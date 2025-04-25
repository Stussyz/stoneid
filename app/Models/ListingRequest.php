<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'agent_id',
        'photo',
        'property_title',
        'property_type',
        'description',
        'price',
        'address',
        'location',
        'transaction_type',
        'status',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
