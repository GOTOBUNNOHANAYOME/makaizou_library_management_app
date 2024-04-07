<?php

namespace App\Http\Controllers;

use App\Models\{
    Library,
    LibraryHistory
};
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index(Request $request)
    {
        $libraries = Library::when(!is_null($request->query('search_word')), function ($query) use ($request) {
            return $query->where('title', 'LIKE', $request->query('search_word'))
                ->orWhere('description', 'LIKE', $request->query('search_word'))
                ->orWhereIn('id', function ($sub_query) use ($request){
                    return $sub_query->select('library_id')
                        ->from('library_authors')
                        ->where('name', 'LIKE', '%' . $request->query('library_info') . '%');
                });
            })
            ->get();

        $library_histories = LibraryHistory::where('user_id', auth()->id())
            ->where('is_enable', true)
            ->pluck('library_id')
            ->toArray();

        return view('library.index',[
                'libraries' => $libraries,
                'library_histories'=> $library_histories
        ]);
    }

    public function show(Request $request, Library $library)
    {
        return view('library.show',
            ['library' => $library]
        );
    }
}
