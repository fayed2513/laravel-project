@extends('layout')

@section('content')
 <p class="text-end">
    <a class="btn btn-primary" href="{{ route('book.create') }}">New Book</a>
</p>

<table class="table table-bordered table-striped">
   <li> <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Author</th>
       <th colspan="3" style="text-align: center;">Action</th>
    </tr></li>
@foreach ($books as $book)
    <tr>
        <td>{{ $book->id }}</td>
        <td>{{ $book->title }}</td>
        <td>${{ $book->author }}</td>
        <td style="text-align: center; vertical-align: middle;"><a href="{{ route('book.show', $book->id) }}">Details</a> </td>
        <td style="text-align: center; vertical-align: middle;"><a href="{{ route('book.edit', $book->id) }}">Edit</a> </td>
        <td>
           <form method="POST" action="{{ route('book.destroy', $book->id) }}"
           onsubmit="return confirm('Are you sure?');" style="display:inline">
               @csrf
               @method('DELETE')
               <input type="submit" class="btn btn-link" value="Delete">
           </form>
        </td>
         
       
    </tr>
@endforeach
</table>
{{ $books->links() }}
@endsection