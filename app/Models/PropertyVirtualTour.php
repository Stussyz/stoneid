<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyVirtualTour extends Model
{
    protected $fillable = [
        'tour_url',
    ];
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
