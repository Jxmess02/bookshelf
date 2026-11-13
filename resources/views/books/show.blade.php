@extends('layouts.app')

@section('content')
    <span class="tag">{{ $book->genre ?? 'General'}}</span>
    @if ($book->cover)
        <img
            src="{{ str_starts_with($book->cover, 'http') ? $book->cover : Storage::url($book->cover) }}"
            alt="{{ $book->title }}"
        >
    @else
        <div class="card-image-placeholder">No Cover Available</div>
    @endif
    <h1>{{ $book->title }}</h1>
    <p>by {{ $book->author }}</p>
@endsection