<?php

namespace App\Models;
use Spatie\Image\Manipulations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class StaticBottomAds extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];


    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('static_bottom')
            ->singleFile();

        $this->addMediaConversion('static_fit')
            ->fit(Manipulations::FIT_CONTAIN, 620, 340)
            ->apply()->fit(Manipulations::FIT_FILL, 620, 340)
            ->background('f7f7f7');
    }

    public function last()
    {
        return static::all()->last();
    }
}
