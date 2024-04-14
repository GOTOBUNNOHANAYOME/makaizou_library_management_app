<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\LoginCredentialRequest;

class LoginCredentialController extends Controller
{
    public function create(Request $request)
    {
        return view('admin.login_credential.create');
    }

    public function store(LoginCredentialRequest $request)
    {
        $admin = Admin::where('login_id', $request->login_id)->first();
        auth()->login($admin);

        return to_route('admin.report.access');
    }
}
