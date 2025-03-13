<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Article;
use App\Models\Author;
use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index(Request $request)
    {
        $search    = $request->input('search');
        $status    = $request->input('status');
        $author    = $request->input('author');
        $from_date = $request->input('from_date');
        $to_date   = $request->input('to_date');

        $query = Article::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('excerpt', 'like', '%' . $search . '%');
            });
        }

        if ($status) {
            $query->where('status', $status);
        }

        if ($author) {
            $query->whereHas('authors', function($q) use ($author) {
                $q->where('id', $author);
            });
        }

        if ($from_date) {
            $query->whereDate('published_at', '>=', $from_date);
        }

        $articles = $query->get();

        $allAuthors = Author::all();

        return view('articles.index', compact('articles', 'allAuthors'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('articles.create', compact('authors'));
    }

    public function store(ArticleStoreRequest $request)
    {
        $article = Article::create($request->validated());
        // Associa os autores ao artigo
        $article->authors()->attach($request->authors);
        return to_route('articles.index')->with('success', 'Artigo cadastrado com sucesso.');
    }

    public function edit(Article $article)
    {
        $authors = Author::all();
        return view('articles.edit', compact('article', 'authors'));
    }

    public function update(ArticleUpdateRequest $request, Article $article)
    {
        $article->update($request->validated());
        # Sync remove os autores antigos e adiciona os novos
        $article->authors()->sync($request->authors);
        return to_route('articles.index')->with('success', 'Artigo atualizado com sucesso.');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return to_route('articles.index')->with('success', 'Artigo deletado com sucesso.');
    }
}
