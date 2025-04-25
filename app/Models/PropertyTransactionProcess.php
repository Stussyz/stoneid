<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyTransactionProcess extends Model
{
    protected $fillable = [
        'status', 'id_preview', 'user_profiles_id',
    ];
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    public function userProfile()
    {
        return $this->belongsTo(UserProfile::class);
    }

    public function stepDetails()
    {
        return $this->hasMany(TransactionStepDetail::class);
    }

    public function documents()
    {
        return $this->hasMany(TransactionDocument::class);
    }
}
