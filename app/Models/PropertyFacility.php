<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyFacility extends Model
{
    protected $fillable = ['complex', 'in_house'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
