<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matchroom extends Model
{
    use HasFactory;
    
    public function hosts()
    {
        return $this->hasMany(Host::class);
    }
    
    public function guests()
    {
        return $this->hasMany(Guest::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    public function messageroom()
    {
        return $this->hasOne(Messageroom::class);
    }
    
    protected $fillable = [
        'category_id',
    ];
}
