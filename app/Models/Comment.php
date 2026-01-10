<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Comment extends Model
{
    protected $fillable = [
        'description',
        'post_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    
    public function users()
    {   
        return $this->belongsToMany(User::class, 'comment_user');
    }
}
