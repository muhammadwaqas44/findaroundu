<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    protected $fillable = ['image','title','is_active','description'];

    public function getImageAttribute($image)
    {
        return asset($image);
    }
}
