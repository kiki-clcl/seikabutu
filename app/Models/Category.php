<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    public function users()   
{
    return $this->hasMany(User::class);  
}

    public function mode()
{
    return $this->belongsTo(Mode::class);
}

public function Matchroom()   
{
    return $this->hasMany(Matchroom::class);  
}

    protected $fillable = [
        'mode_id',
    ];
    //public function getByCategory(int $limit_count = 5)
    //{
       // return $this->posts()->with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    //}
}