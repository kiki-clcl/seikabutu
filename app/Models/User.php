<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


        public function category()
        {
            return $this->belongsTo(Category::class);
        }
        
        public function rank()
        {
            return $this->belongsTo(Rank::class);
        }
        
        public function hosts()
        {
            return $this->hasMany(Host::class);
        }
        
        public function guests()
        {
            return $this->hasMany(Guest::class);
        }
        
        public function messagerooms()
        {
            return $this->hasMany(messageroom::class);
        }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'body',
        'icon_url',
        'category_id',
        'rank_id',
    ];
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    


    
    //<a href="/names/{{ $user->id }}/edit" class="btn btn-primary">編集</a>
    //<input type='text' name='name' value="{{ $user->name }}">
                //<input type='text' name='body' value="{{ $user->body }}">
}
