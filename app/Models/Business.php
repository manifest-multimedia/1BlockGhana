<?php

namespace App\Models;

use App\Models\Development;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Business extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function properties(){
        return $this->hasMany(Properties::class);
    }
    public function developments(){
        return $this->hasMany(Development::class);
    }
    public function partner(){
        return $this->belongsTo(BusinessType::class, 'business_type_id','id');
    }
    public function package(){
        return $this->belongsTo(Package::class, 'package_id','id');
    }
    public function businessType(){
        return $this->belongsTo(BusinessType::class, 'business_type_id','id');
    }

}
