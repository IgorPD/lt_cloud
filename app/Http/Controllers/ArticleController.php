<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Article;
use App\Models\Author;
use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
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
