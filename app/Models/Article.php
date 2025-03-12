<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    # Atributos que podem ser preenchidos em massa
    protected $fillable = ['title', 'content', 'excerpt', 'published_at', 'status'];

    # Atributos que devem ser convertidos para tipos de dados nativos
    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Sempre gerar um slug ao criar um artigo, para converter o título em uma URL amigável
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($article) {
            $article->slug = Str::slug($article->title);
        });
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'article_author');
    }

    public function getShortExcerptAttribute()
    {
        return Str::limit($this->excerpt, 60, '...');
    }

    public function getShortTitleAttribute()
    {
        return Str::limit($this->title, 30, '...');
    }

}
