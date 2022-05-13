<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class TopAds extends Model implements HasMedia
{
    use Notifiable, InteractsWithMedia;

    protected $guarded = [];

    public static function last()
    {
        return static::all()->last();
    }

    public static function findId($id)
    {
        return static::find($id);
        //return dd(static::find($id));
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('adImage-1000')
              ->width(1000)
              ->height(700);

    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('adImage')
            ->singleFile();
    }
}
