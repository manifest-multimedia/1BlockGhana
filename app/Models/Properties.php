<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Properties extends Model
{
    use HasFactory;

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
}