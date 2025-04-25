<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionStepDetail extends Model
{
    protected $fillable = ['transaction_id', 'step_name', 'description', 'additional_data'];

    protected $casts = [
        'additional_data' => 'array',
    ];

    public function transaction()
    {
        return $this->belongsTo(PropertyTransactionProcess::class);
    }
}
