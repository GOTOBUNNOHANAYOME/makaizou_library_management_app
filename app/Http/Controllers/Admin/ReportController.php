<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    LoginCredential,
    User
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function accessReport(Request $request)
    {
        $login_credential = LoginCredential::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as access_count'))
            ->orderBy('date', 'desc')
            ->groupBy('date')
            ->pluck('date', 'access_count')
            ->toArray();

        $today_access = LoginCredential::whereDate('created_at', now())->get()?->count();

        return view("admin.report.access_report", [
            'date'  => array_values($login_credential),
            'access_count' => array_keys($login_credential),
            'today_access' => $today_access ?? 0
        ]);
    }

    public function userReport(Request $request)
    {
        $today_created = User::whereDate('created_at', now())?->count();
        $user = User::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as created_count'))
            ->orderBy('date','desc')
            ->groupBy('date')
            ->pluck('date', 'created_count')
            ->toArray();

        return view('admin.report.user_report', [
            'date' => array_values($user),
            'created_user_count' => array_keys($user),
            'today_created' => $today_created ?? 0,
        ]);
    }
}
