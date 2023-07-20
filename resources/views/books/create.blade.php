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
    <div class="container w-50">
        <div class="row m-5">
            <div class="col-md-6 text-success">
                <h3>Create Book</h3>
            </div>
            <form class="row g-3" action="{{ route('books.store') }}" method="POST">
                @csrf
                <div class="col-md-6">
                    <label for="inputName" class="form-label">Book Name</label>
                    <input type="text" class="form-control" id="inputName" name="book_name" required>
                </div>
                <div class="col-md-6">
                    <label for="inputPrice" class="form-label">Book Price</label>
                    <input type="number" class="form-control" id="inputPrice" name="book_price" required>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success col-6">Save</button>
                </div>
                <div class="col-6">
                    <a href="{{ route('books.index') }}" class="btn btn-outline-success col-6">Back</a>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
