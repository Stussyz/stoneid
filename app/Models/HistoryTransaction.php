<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'agent_profile_id',
        'user_profile_id',
        'finalized_at',
        'total_value',
        'transaction_type',
        'duration',
        'notes',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function agentProfile()
    {
        return $this->belongsTo(AgentProfile::class);
    }

    public function userProfile()
    {
        return $this->belongsTo(UserProfile::class);
    }
}
