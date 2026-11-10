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
                    <img src="{{ str_starts_with($book->cover, 'http') ? 
                    $book->cover : Storage::url($book->cover) }}" 
                    alt="{{ $book->title }}">
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
    @if($books->total() > 0)
    <p>
        Showing {{ $books->firstItem() }} - {{  $books->lastItem() }}
        of {{ $books->total() }} books
    </p>
    @endif
    @if ($books->hasPages())
    <nav class="paginations">
        <span class="pagination-links">
            @if ($books->onFirstPage())
                <span class="disabled">Previous</span>
            @else
                <a href="{{ $books->previousPageUrl() }}" rel="prev">Previous</a>
            @endif

            @foreach ($books->getUrlRange(1, $books->lastPage()) as $page => $url)
                @if ($page == $books->currentPage())
                    <span class="current">{{ $page }}</span>
                @else
                    <a href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach

            @if ($books->hasMorePages())
                <a href="{{ $books->nextPageUrl() }}" rel="next">Next</a>
            @else
                <span class="pagination-disabled">Next</span>
            @endif


        
    @endif 
@endsection