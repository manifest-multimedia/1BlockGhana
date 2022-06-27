<?php

namespace App\Models;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class StaticTopAds extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    public function registerMediaConversions(Media $media = null): void
    {

        $image = $this->addMediaConversion('thumb');
        $image->width(100);
        $image->height(100);

        $this->addMediaConversion('static_fit')
                ->fit(Manipulations::FIT_CONTAIN, 620, 340)
                ->apply()->fit(Manipulations::FIT_FILL, 620, 340)
                ->background('f7f7f7');
    }


    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('static_top')
            ->singleFile();
    }

    public function last()
    {
        return static::all()->last();
    }
}
