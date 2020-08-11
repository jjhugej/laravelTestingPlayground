<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;

class BooksController extends Controller
{
    public function store(){

        $data = request()->validate([
            'title' => 'required',
            'author' => 'required',
        ]);
        
        Book::create($data);
    }
}
