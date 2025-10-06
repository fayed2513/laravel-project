@extends('layout')
@section('content')
    <table class="table table-bordered table-striped">
        <tr>
            <th>Id:</th>
             <td>{{ $book->id }}</td>
         </tr>

        <tr>
            <th>Title:</th>
             <td>{{ $book->title }}</td>
        </tr>

        <tr>
            <th>Author: </th>
            <td>{{ $book->author }}</td>
        </tr>

        <tr>
           <th>ISBN:</th>
            <td>{{ $book->isbn }}</td>
        </tr>

        <tr>
            <th>Stock:</th>
            <td>{{ $book->stock }}</td>
        </tr>

        <tr>
            <th>Price:</th>
            <td>{{ $book->price }}</td>
        </tr>

    </table>
    <div>
     <a href="{{ route("book.index") }}" class="btn btn-primary"><i class="bi bi-arrow-left-circle"></i> Back</a>
     <a href="{{ route("book.edit", $book->id) }}" class="btn btn-secondary"><i class="bi bi-pencil"></i> Edit</a>
    </div>
@endsection