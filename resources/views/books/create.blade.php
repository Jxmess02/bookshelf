@extends('layouts.app')

@section('content')
    <h1>Add New Book</h1>

    <form class="form-panel" method="POST" action="{{ route('books.store') }}">
        @csrf

        <label for="title">Book Title</label>
        <input
            id="title"
            name="title"
            type="text"
            maxlength="150"
            value="{{ old('title') }}"
            required
        >
        @error('title')
            <p>{{ $message }}</p>
        @enderror

        <label for="author">Book Author</label>
        <input
            id="author"
            name="author"
            type="text"
            maxlength="100"
            value="{{ old('author') }}"
            required
        >
        @error('author')
            <p>{{ $message }}</p>
        @enderror

        <label for="genre">Book Genre</label>
        <input
            id="genre"
            name="genre"
            type="text"
            maxlength="50"
            value="{{ old('genre') }}"
            required
        >
        @error('genre')
            <p>{{ $message }}</p>
        @enderror

        <label for="cover">Book Cover</label>
        <input
            id="cover"
            name="cover"
            type="url"
            maxlength="2048"
            value="{{ old('cover') }}"
        >
        @error('cover')
            <p>{{ $message }}</p>
        @enderror

        <button type="submit">Add Book</button>
    </form>
@endsection