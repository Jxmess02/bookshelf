<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('publisher')->paginate(5);

        return view('books.index', compact('books'));
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function create()
    {
        $publishers = Publisher::all();

        return view('books.create', compact('publishers'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'author' => ['required', 'string', 'max:100'],
            'genre' => ['required', 'string', 'max:50'],
            'cover' => ['nullable', 'image',
                'mimes:jpeg,png,webp', 'max:2048'],
            'publisher_id' => ['nullable', 'exists:publishers,id'],
        ]);

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')
                ->store('covers', 'public');
        } else {
            $validated['cover'] = null;
        }

        Book::create($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Book created successfully!');
    }

    public function edit(Book $book)
    {
        $publishers = Publisher::all();

        return view('books.edit', compact('book', 'publishers'));
    }

    public function update(Request $request, Book $book): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'author' => ['required', 'string', 'max:100'],
            'genre' => ['required', 'string', 'max:50'],
            'cover' => ['nullable', 'image', 'mimes:jpeg,png,webp', 'max:2048'],
            'publisher_id' => ['nullable', 'exists:publishers,id'],
        ]);

        $oldCover = $book->cover;

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')
                ->store('covers', 'public');
        } else {
            unset($validated['cover']);
        }

        $book->update($validated);

        if ($request->hasFile('cover') && $oldCover && ! str_starts_with($oldCover, 'http')) {
            Storage::disk('public')->delete($oldCover);
        }

        return redirect()
            ->route('books.index')
            ->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book): RedirectResponse
    {
        if ($book->cover && ! str_starts_with($book->cover, 'http')) {
            Storage::disk('public')->delete($book->cover);
        }

        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Book deleted successfully');
    }
}
