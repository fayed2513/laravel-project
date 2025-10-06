@extends('layout')
@section('content')
 <a href="{{ route("book.index") }}" class="btn btn-primary"><i class="bi bi-arrow-left-circle"></i> Back</a>

<legend class="mb-4">Update Book</legend>

    <form method="POST" action="{{ route('book.update') }}">
      @csrf
      @method('PUT')
      <input type="hidden" name="id" value="{{ $book->id }}">
  <div class="mb-3">
    <label for="Title" class="form-label">Title</label>
    <input type="text" class="form-control" name="title" value="{{ old('title', $book->title) }}">
<div>{{ $errors->first('title') }}</div>
  </div>

   <div class="mb-3">
    <label for="Author" class="form-label">Author</label>
    <input type="text" class="form-control" name="author" value="{{ old('author', $book->author) }}">
<div>{{ $errors->first('author') }}</div>
  </div>

 <div class="mb-3">
    <label for="isbn" class="form-label">ISBN</label>
    <input type="text" class="form-control" name="isbn" value="{{ old('isbn', $book->isbn) }}">
<div>{{ $errors->first('isbn') }}</div>
  </div>
    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" class="form-control" name="stock" value="{{ old('stock', $book->stock) }}">
<div>{{ $errors->first('stock') }}</div>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control" name="price" value="{{ old('price', $book->price) }}">
<div>{{ $errors->first('price') }}</div>
    </div>
  <button type="submit" class="btn btn-primary"><i class="bi bi-file-arrow-up"></i> Submit</button>
</form>
@endsection