<?php

namespace App\Http\Controllers;

use App\Models\{
    Library,
    LibraryHistory
};
use Illuminate\Http\Request;

class LibraryHistoryController extends Controller
{
    public function index(Request $request)
    {
        $library_histories = LibraryHistory::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        $libraries = Library::all();

        return view("library_history.index", [
            'library_histories' => $library_histories,
            'libraries'         => $libraries
        ]);
    }

    public function store(Request $request, Library $library){
        $library_history = LibraryHistory::create([
            'user_id'    => auth()->id(),
            'library_id' => $library->id,
            'expired_at' => now()->addDays(7),
            'is_enable'  => true,
        ]);

        return to_route('library_history.complete', $library_history);
    }

    public function bookReturn(Request $request, Library $library){
        $library_history = LibraryHistory::where('user_id', auth()->id())
            ->where('library_id', $library->id)
            ->where('is_enable', true)
            ->first();
        
        $library_history->is_enable = false;
        $library_history->save();

        return to_route('library_history.complete', $library_history);
    }

    public function complete(Request $request, LibraryHistory $library_history)
    {
        return view($library_history->is_enable ? 'library_history.complete_rental' : 'library_history.complete_return', [
            'library'         => $library_history->library,
            'library_history' => $library_history
        ]);
    }
}
