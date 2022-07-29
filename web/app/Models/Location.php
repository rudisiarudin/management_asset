<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function asset()
    {
        return $this->hasMany(Asset::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function locationCount(){
        return Location::count();
    }
}
