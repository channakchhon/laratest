<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body', 'title','user_id'
    ];

  
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}

