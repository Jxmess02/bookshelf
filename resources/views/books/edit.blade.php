@extends('layouts.app')

@section('content')
    <h1> Edit Book</h1>
    <form class="form-panel" method="POST"
        action="{{ route('books.update', $book) }}"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Book Title</label>
        <input type="text" name="title"
        maxlength="150"
        required
        value="{{ old('title', $book->title) }}"><br>
        @error('title')
            <p class="error">{{$message}}</p>
        @enderror

        <label>Book Author</label>
        <input type="text" name="author"
         maxlength="100"
        required
        value="{{ old('author', $book->author) }}"><br>
         @error('author')
            <p class="error">{{$message}}</p>
        @enderror

        <label>Book Genre</label>
        <input type="text" name="genre"
         maxlength="50"
        required
        value="{{ old('genre', $book->genre) }}"><br>
        @error('genre')
            <p class="error">{{$message}}</p>
        @enderror

        <label>Book Cover</label>
        @if ($book->cover)
            <img
                src="{{ str_starts_with($book->cover, 'http') ? $book->cover : Storage::url($book->cover) }}"
                alt="Current cover for {{ $book->title }}"
            >
        @endif
        <input type="file" name="cover" accept="image/jpeg,image/png,image/webp">
        @error('cover')
            <p class="error">{{$message}}</p>
        @enderror

        <label>Publisher</label>
        <select name="publisher_id" id="publisher">
            <option value="">Select a publisher</option>
            @foreach ($publishers as $publisher)
                <option value="{{ $publisher->id }}" {{ old('publisher_id', $book->publisher_id) == $publisher->id ? 'selected' : '' }}>
                    {{ $publisher->name }}
                </option>
            @endforeach
        </select>
        @error('publisher_id')
            <p class="error">{{ $message }}</p>
        @enderror

        <button>Update Book</button>

    </form>
@endsection