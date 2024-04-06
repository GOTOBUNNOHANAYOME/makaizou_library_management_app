<?php

namespace App\Http\Controllers;

use App\Models\{
    Library,
    LibraryAuthor
};
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index(Request $request)
    {
        $libraries = Library::when(!is_null($request->query('library_info')), function ($query) use ($request) {
            return $query->where('title', 'LIKE', $request->query('library_info'))
                ->orWhere('description', 'LIKE', $request->query('library_info'))
                ->orWhere('id', function ($sub_query) use ($request){
                    return LibraryAuthor::where('name', 'LIKE', $request->query('library_info'))
                        ->pluck('library_id');
                });
        })
        ->get();
        return view('library.index', $libraries);
    }

    public function show(Request $request, Library $library)
    {
        return view('library.show', $library);
    }
}
