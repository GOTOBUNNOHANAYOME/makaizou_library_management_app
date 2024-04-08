<?php

namespace App\Http\Controllers;

use App\Models\{
    Library,
    LibraryHistory,
    LibraryReview,
};
use App\Http\Requests\LibraryReviewRequest;
use Illuminate\Http\Request;

class LibraryReviewController extends Controller
{
    public function create(Request $request, Library $library, LibraryHistory $library_history)
    {

        if(LibraryReview::where('library_history_id', $library_history->id)->exists()) {
            return to_route('library.show', $library->id);
        }

        return view('library_review.create', [
            'library'         => $library,
            'library_history' => $library_history
        ]);
    }

    public function store(LibraryReviewRequest $request)
    {
        LibraryReview::create([
            'user_id'           => auth()->id(),
            'library_id'        => $request->library_id,
            'library_history_id'=> $request->library_history_id,
            'comment'           => $request->comment,
            'score'             => $request->score,
        ]);

        return to_route('library.show', $request->library_id);
    }
}
