<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment'
    ];
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
