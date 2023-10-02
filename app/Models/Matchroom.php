<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matchroom extends Model
{
    use HasFactory;
    
    public function host()
    {
        return $this->belongsTo(Host::class);
    }
    
    public function guests()
    {
        return $this->hasmany(Guest::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
