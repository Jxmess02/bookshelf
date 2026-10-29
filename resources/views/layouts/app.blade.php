<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bookshelf</title>
    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
</head>
<body>

    <header class="container" site-header>
        <a href="{{ route('books.index') }}">Bookshelf</a>
    </header>

    <main class="container" site-main>
        @yield('content')

    </main>


    
    
</body>
</html>