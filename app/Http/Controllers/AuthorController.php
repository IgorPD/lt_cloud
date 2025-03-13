<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Author;
use App\Http\Requests\AuthorStoreRequest;
use App\Http\Requests\AuthorUpdateRequest;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');

        $query = Author::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        if ($status) {
            $query->where('status', $status);
        }

        $authors = $query->get();

        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(AuthorStoreRequest $request)
    {
        Author::create($request->validated());
        return to_route('authors.index')->with('success', 'Autor cadastrado com sucesso.');;
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(AuthorUpdateRequest $request, Author $author)
    {
        $author->update($request->validated());
        return to_route('authors.index')->with('success', 'Autor atualizado com sucesso.');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return to_route('authors.index')->with('success', 'Autor deletado com sucesso.');
    }
}
