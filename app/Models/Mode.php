<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mode extends Model
{
    use HasFactory;
    
        public function category()
    {
        return $this->hasMany(Category::class);
    }
}