<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDocument extends Model
{
    protected $fillable = ['transaction_id', 'type', 'file_path'];

    public function transaction()
    {
        return $this->belongsTo(PropertyTransactionProcess::class);
    }
}
