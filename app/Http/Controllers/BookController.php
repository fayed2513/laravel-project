<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class bookController extends Controller
{
    public function index(request $request){
        
        if($request-> has("search")){
        $books=Book::
        where("title", "like", "%".$request->get("search")."%")
       ->orwhere("author", "like", "%".$request->get("search")."%")
       ->paginate(10);
        }
        else{
          $books=Book::paginate(10);
        }

         return view("books.index")->with("books", $books);
}

public function show($id){
    $book=Book::find($id);
   return view("books.show")->with("book",$book);
}
public function create(){
    return view("books.create");

}
public function store(Request $request){    
    $rules = [
         'title' => 'required|string|max:255',
         'author' => 'required|string|max:255',
         'isbn' => 'required|size:13|unique:books,isbn',
          'stock' => 'required|integer|numeric|gte:0',
          'price' => 'required|numeric|gte:0',
    ];

    $messages = [
        'title.required' => 'The title field is required.',
        'author.required' => 'The author field is required.',
        'isbn.required' => 'The ISBN field is required.',
        'isbn.size' => 'The ISBN must be exactly 13 characters.',
        'isbn.unique' => 'The ISBN has already been taken.',
        'stock.required' => 'The stock field is required.',
        'stock.gte' => 'The stock must be greater than or equal to 0.',
        'price.required' => 'The price field is required.',
        'price.numeric' => 'The price must be a number.',
        'price.gte' => 'The price must be greater than or equal to 0.',
    ];

   $request->validate($rules, $messages);
   $book=Book::create($request->all());
   return redirect()->route("book.show", $book->id);
}

public function destroy(request $request, $id){
   $book=Book::find($id);
       $book->delete();
   return redirect()->route("book.index");

}
public function edit($id){
    $book=Book::find($id);
   return view("books.edit")->with("book",$book);
}
public function update(Request $request){
  $rules = [
         'title' => 'required|string|max:255',
         'author' => 'required|string|max:255',
         'isbn' => 'required|size:13|unique:books,isbn',
          'stock' => 'required|integer|numeric|gte:0',
          'price' => 'required|numeric|gte:0',
    ];

    $messages = [
        'title.required' => 'The title field is required.',
        'author.required' => 'The author field is required.',
        'isbn.required' => 'The ISBN field is required.',
        'isbn.size' => 'The ISBN must be exactly 13 characters.',
        'isbn.unique' => 'The ISBN has already been taken.',
        'stock.required' => 'The stock field is required.',
        'stock.gte' => 'The stock must be greater than or equal to 0.',
        'price.required' => 'The price field is required.',
        'price.numeric' => 'The price must be a number.',
        'price.gte' => 'The price must be greater than or equal to 0.',
    ];

    $request->validate($rules, $messages);
    $book=Book::find($request->id);
    $book->update($request->all());
    return redirect()->route("book.show", $book->id);

//    echo "<pre>";
//    print_r($book);
//    echo "</pre>";

}
}