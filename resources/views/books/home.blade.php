<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Testing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <header class="row">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="btn btn-outline-primary ms-4" aria-current="page"
                                    href="{{ route('books.index') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-success ms-3" href="{{ route('books.create') }}">Create Book</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="row m-4">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @foreach ($books as $book)
                <div class="card mx-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Book title : {{ $book->book_name }}</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Book Price : {{ $book->book_price }} ฿</h6>
                        <form method="POST" action="{{ route('books.destroy', $book->book_id) }}">
                            <a href="{{ route('books.edit', $book->book_id) }}"
                                class="btn btn-primary card-link">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger card-link">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
