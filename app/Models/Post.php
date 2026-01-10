<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Post extends Model
{
    protected $fillable = [
        'description',
        'color',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}   
