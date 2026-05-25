<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Book extends Model
{
    use HasFactory;


    protected $fillable = [
    'title',
    'author_id',
    'category_id',
    'publisher_id',
    'published_year',
    'pages',
    'cover_image',
    ];


    public function author()
    {
        return $this->belongsTo(Author::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'borrowings')
                    ->withPivot('id', 'borrowed_at', 'returned_at')
                    ->withTimestamps();
    }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'author_id' => 'required|exists:authors,id',
    //         'category_id' => 'required|exists:categories,id',
    //         'publisher_id' => 'required|exists:publishers,id',
    //         'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    //     ]);

    //     if ($request->hasFile('cover_image')) {
    //         $path = $request->file('cover_image')->store('covers', 'public');
    //         $validated['cover_image'] = $path;
    //     }

    //     Book::create($validated);

    //     return redirect()->route('books.index')->with('success', 'Livro cadastrado com sucesso.');
    // }

    
    // public function update(Request $request, Book $book)
    // {
    //     $validated = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'author_id' => 'required|exists:authors,id',
    //         'category_id' => 'required|exists:categories,id',
    //         'publisher_id' => 'required|exists:publishers,id',
    //         'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    //     ]);

    //     if ($request->hasFile('cover_image')) {
    //         // Deletar imagem antiga
    //         if ($book->cover_image) {
    //             Storage::disk('public')->delete($book->cover_image);
    //         }

    //         // Salvar nova imagem
    //         $path = $request->file('cover_image')->store('covers', 'public');
    //         $validated['cover_image'] = $path;
    //     }

    //     $book->update($validated);

    //     return redirect()->route('books.index')->with('success', 'Livro atualizado com sucesso.');
    // }

    // public function destroy(Book $book)
    // {
    //     if ($book->cover_image) {
    //         Storage::disk('public')->delete($book->cover_image);
    //     }

    //     $book->delete();

    //     return redirect()->route('books.index')->with('success', 'Livro excluído com sucesso.');
    // }




}


;


