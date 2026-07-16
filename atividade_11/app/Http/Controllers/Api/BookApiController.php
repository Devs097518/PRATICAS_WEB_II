<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookApiController extends Controller
{
    // GET /api/books
    public function index()
    {
        $books = Book::with(['author', 'category', 'publisher'])->get();

        return response()->json($books, 200);
    }

    // GET /api/books/{book}
    public function show(Book $book)
    {
        $book->load(['author', 'category', 'publisher']);

        return response()->json($book, 200);
    }

    // POST /api/books
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'          => 'required|string|max:255',
            'author_id'      => 'required|exists:authors,id',
            'category_id'    => 'required|exists:categories,id',
            'publisher_id'   => 'required|exists:publishers,id',
            'published_year' => 'nullable|integer',
            'pages'          => 'nullable|integer',
            'cover_image'    => 'nullable|string',
        ]);

        $book = Book::create($validated);

        return response()->json($book, 201);
    }

    // PUT/PATCH /api/books/{book}
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title'          => 'sometimes|required|string|max:255',
            'author_id'      => 'sometimes|required|exists:authors,id',
            'category_id'    => 'sometimes|required|exists:categories,id',
            'publisher_id'   => 'sometimes|required|exists:publishers,id',
            'published_year' => 'nullable|integer',
            'pages'          => 'nullable|integer',
            'cover_image'    => 'nullable|string',
        ]);

        $book->update($validated);

        return response()->json($book, 200);
    }

    // DELETE /api/books/{book}
    public function destroy(Book $book)
    {
        $book->delete();

        return response()->json(['message' => 'Livro removido com sucesso.'], 200);
    }
}