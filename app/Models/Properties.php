<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Properties extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    public function business(){
        return $this->belongsTo(Business::class, 'business_id');
    }
    public function currency(){
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function amenities(){
        return $this->belongsToMany(Amenities::class);
    }

    public function gallerycover()
    {
    return $this->hasOne(Gallery::class, 'property_id');
    }
    public function gallery()
    {
    return $this->hasMany(Gallery::class, 'property_id');
    }


    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb-50')
              ->width(50)
              ->height(50);

        $this->addMediaConversion('thumb-100')
              ->width(100)
              ->height(100);
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('logos')
            ->singleFile();
    }

    public function last()
    {
        return static::all()->last();
    }
}
