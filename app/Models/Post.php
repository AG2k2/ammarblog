<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];



    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function parts(){
        return $this->hasMany(Part::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query -> when($filters['search'] ?? false, fn($query, $search) =>
            $query -> where( fn($query) =>
                $query -> where('title','like','%'. $search .'%')

        ));

        $query -> when($filters['category'] ?? false, fn($query, $category) =>
            $query -> whereHas( 'category', fn($query) => $query -> where('slug', $category)
        ));
    }
}
