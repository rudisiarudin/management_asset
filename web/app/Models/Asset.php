<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $guarded =  ['id'];

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'categories_id');
    }
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
