@extends('layouts.app')


@section('content')
    <h1>Books Collection</h1>
    <p>Browse and manage books in our database.</p>
    <a class="button" href="{{ route('books.create') }}">Add New Book</a>
    <div class="book-grid"> 
        @foreach ($books as $book)
            <a href="{{ url('books/' . $book->id) }}">
                <article class="card">
                    <span class="tag">{{ $book->genre }}</span>
                    <img src="{{ $book->cover }}" alt="">
                    <h2>{{ $book->title }}</h2>
                    <p>by {{ $book->author }}</p>
                    <p>Published by: {{ $book->publisher?->name ?? 'Unknown' }}</p>
                    <a class="button" href="{{ route('books.edit', $book) }}">Edit Book</a>
                    <form action="{{ route('books.destroy', $book) }}" method="DELETE">
                        @csrf
                        @method('DELETE')
                        <button class="danger">Delete Book</button>
                    </form>
                </article>
            </a>
        @endforeach
    </div>
@endsection