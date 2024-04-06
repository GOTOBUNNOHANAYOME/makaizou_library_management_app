<?php

namespace App\Http\Controllers;

use App\Models\LibraryHistory;
use Illuminate\Http\Request;

class LibraryHistoryController extends Controller
{
    public function index(Request $request)
    {
        $library_history = LibraryHistory::where('user_id', auth()->id())->get();
        return view("library_history.index", $library_history);
    }
}
