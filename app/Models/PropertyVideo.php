<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyVideo extends Model
{
    protected $fillable = [
        'video_path',
    ];
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
