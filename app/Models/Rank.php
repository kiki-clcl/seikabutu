<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;
    
        public function users()   
    {
    return $this->hasMany(User::class);  
    }
    
    protected $fillable = [
        'title',
        ];


    //public function getByCategory(int $limit_count = 5)
    //{
       // return $this->posts()->with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    //}
}