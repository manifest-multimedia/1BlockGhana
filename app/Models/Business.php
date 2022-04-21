<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function properties(){
        return $this->hasMany(Properties::class);
    }
    public function package(){
        return $this->belongsTo(Package::class, 'package_id','id');
    }

}
