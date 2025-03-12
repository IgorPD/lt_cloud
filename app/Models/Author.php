<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'bio', 'status'];

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_author');
    }

    public function getShortBioAttribute()
    {
        return Str::limit($this->bio, 100, '...');
    }

    public function getShortNameAttribute()
    {
        return Str::limit($this->name, 50, '...');
    }
}
