<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function asset()
    {
        return $this->hasMany(Asset::class);
    }
    public function procurement()
    {
        return $this->hasMany(Procurement::class);
    }
}
