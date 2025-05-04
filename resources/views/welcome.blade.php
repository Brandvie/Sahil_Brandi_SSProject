<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esoteric Library</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container text-center mt-5">
        <h1>Welcome to Esoteric Library</h1>
        <p class="lead">Explore a vast collection of books, authors, and categories.</p>
        <div class="mt-4">
            <a href="{{ route('books.index') }}" class="btn btn-primary">Browse Books</a>
            <a href="{{ route('authors.index') }}" class="btn btn-secondary">View Authors</a>
            <a href="{{ route('categories.index') }}" class="btn btn-success">Explore Categories</a>
        </div>
    </div>
</body>
</html>
