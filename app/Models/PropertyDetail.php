<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyDetail extends Model
{
    protected $fillable = [
        'bedrooms', 'bathrooms', 'land_area', 'building_area', 'carport', 'floors', 'certificate', 'furnishing', 'electricity', 'kitchen', 'concept_and_style', 'condition',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

}
