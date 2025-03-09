<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'post'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeName(Builder $query, string $name) : Builder
    {
        return $query->where('name', "LIKE", "%" . $name . "%");
    }

    public function scopeCommentCount(Builder $query) : Builder
    {
        return $query->withCount("comments") // comments + _count = alias
        ->orderBy('comments_count', 'desc');
    }

}
