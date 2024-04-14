<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index(Request $request)
    {
        return view("admin.library.index", [
            "google_api" => config('services.google_book.url'),
            'redirect_url' => route('admin.library.store')
        ]);
    }

    public function store(Request $request)
    {
        $book_id = $request?->book_id;
    }
}
