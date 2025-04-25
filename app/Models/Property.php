<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Property extends Model
{
    protected $fillable = [
        'user_profile_id',
        'id_preview',
        'slug',
        'name',
        'status',
        'price',
        'transaction_type',
        'min_rent_period',
        'property_type',
        'description',
        'completed_at',
        'expires_at',
    ];

    protected static function booted()
    {

        static::creating(function ($property) {
            $property->id_preview = 'STN_' . Str::random(12);
            $property->slug       = Str::slug($property->name); //for SEO friendly
        });

        static::deleting(function ($property) {

            //delete address manually (morph relation)
            $property->address()->delete();

            if (! empty($property->video)) {
                Storage::disk('public')->delete($property->video->video_path);
                // Storage::delete('public/' . $property->video->video_path);
                // $property->video()->delete();
            }

            foreach ($property->propertyImages as $image) {
                Storage::disk('public')->delete($image->image_path);
                // Storage::delete('public/' . $image->image_path);
                // $image->delete();
            }
        });
    }

    public function scopeFilter($query, Request $request)
    {
        return \App\Filters\PropertyFilter::apply($query, $request);
    }

    public function agentProfile()
    {
        return $this->belongsTo(AgentProfile::class);
    }

    public function listingRequest()
    {
        return $this->belongsTo(ListingRequest::class);
    }

    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function propertyImages()
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function videos()
    {
        return $this->hasOne(PropertyVideo::class);
    }

    public function virtualTour()
    {
        return $this->hasOne(PropertyVirtualTour::class);
    }

    public function favorites()
    {
        return $this->hasMany(PropertyUserFavorite::class);
    }

    public function transactions()
    {
        return $this->hasOne(PropertyTransactionProcess::class);
    }

    public function historyTransaction()
    {
        return $this->hasOne(HistoryTransaction::class);
    }

    public function details()
    {
        return $this->hasOne(PropertyDetail::class);
    }

    public function facilities()
    {
        return $this->hasOne(PropertyFacility::class);
    }

    public function favoritedByUsers()
    {
        return $this->belongsToMany(UserProfile::class, 'property_user_favorites');
    }

}
