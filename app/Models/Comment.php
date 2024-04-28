<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function author(){
        return $this->belongsTo(User::class, "user_id");
    }

    protected function post(){
        return $this->belongsTo(Post::class);
    }
}
