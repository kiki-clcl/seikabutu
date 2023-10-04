<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;
    
        public function user()
    {
        return $this->hasOne(User::class);
    }
    
    public function matchroom()
    {
        return $this->belongsTo(Matchroom::class);
    }
}
