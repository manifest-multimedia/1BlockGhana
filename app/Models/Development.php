<?php

namespace App\Models;
use Spatie\Image\Manipulations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Cviebrock\EloquentSluggable\Sluggable;

class Development extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    use Sluggable;

    protected $table = 'development';
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function business(){
        return $this->belongsTo(Business::class, 'business_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function amenities(){
        return $this->belongsToMany(Amenities::class);
    }


    public function registerMediaConversions(Media $media = null): void
    {

        $this->addMediaConversion('banner_fit')
                ->fit(Manipulations::FIT_CONTAIN, 1200, 300)
                ->apply()->fit(Manipulations::FIT_FILL, 1200, 300)
                ->background('f7f7f7');
    }

    public function last()
    {
        return static::all()->last();
    }

    public static function boot(){

        parent::boot();

        static::creating(function($model){
            $model->development_id = 'D' . str_pad($model->max('id')+1, 6,0,STR_PAD_LEFT);

        });
    }
}
