<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procurement extends Model
{
    use HasFactory;
    protected $guarded =  ['id'];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public static function procurementCount(){
        return Procurement::count();
    }
}
