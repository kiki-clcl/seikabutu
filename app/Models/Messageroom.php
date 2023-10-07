<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messageroom extends Model
{
    use HasFactory;
    
        public function user()   
    {
    return $this->belongsTo(User::class);  
    }
    
        public function matchroom()
        {
            return $this->belongsTo(Matchroom::class);
        }
    
    protected $fillable = [
        'message',
        ];


    //public function getByCategory(int $limit_count = 5)
    //{
       // return $this->posts()->with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    //}
}