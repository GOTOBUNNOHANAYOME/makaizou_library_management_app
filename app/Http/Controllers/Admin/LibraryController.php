<?php

namespace App\Http\Controllers\Admin;

use App\Models\{
    LibraryAuthor,
    Library
};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LibraryController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.library.index', [
            'google_api' => config('services.google_book.url'),
            'redirect_url' => route('admin.library.store'),
            'search_count_url' => route('admin.library.calc_count')
        ]);
    }

    public function store(Request $request)
    {
        $book_id = $request->book_id ?? null;
        if(is_null($book_id)){
            return;
        }

        $response = Http::get(config('services.google_book.url').$book_id);
        $book_data = $response->json()['items'][0];

        $library = Library::create([
            'title'          => $book_data['volumeInfo']['title'] ?? null,
            'api_id'         => $book_data['id'] ?? null,
            'isbn_10'        => $book_data['volumeInfo']['industryIdentifiers'][0]['identifier'] ?? null,
            'isbn_13'        => $book_data['volumeInfo']['industryIdentifiers'][1]['identifier'] ?? null,
            'description'    => $book_data['volumeInfo']['description'] ?? null,
            'page'           => $book_data['volumeInfo']['pageCount'] ?? null,
            'thumbnail_path' => $book_data['volumeInfo']['imageLinks']['thumbnail'] ?? null,
            'icon_path'      => $book_data['volumeInfo']['imageLinks']['smallThumbnail'] ?? null,
            'country'        => $book_data['volumeInfo']['country'] ?? null,
            'publisher'      => $book_data['volumeInfo']['publisher'] ?? null,
            'published_at'   => $book_data['volumeInfo']['publishedDate'] ?? null,
        ]);
        foreach($book_data['volumeInfo']['authors'] as $author){
            LibraryAuthor::create([
                'library_id' => $library->id,
                'name'       => $author,
            ]);
        }
    }

    public function calcCount(Request $request)
    {
        if(is_null($request->items ?? null)){
            return response()->json(null);
        }
        $library_counts = [];
        foreach($request->items as $item){
            $library_counts[$item['id']] = Library::where('api_id', $item['id'])
                ?->count() ?? 0;
        }

        return response()->json($library_counts);
    }
}
