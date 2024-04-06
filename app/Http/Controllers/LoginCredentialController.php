<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LoginCredential;
use App\Http\Requests\LoginCredentialRequest;
use App\helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoginCredentialController extends Controller
{
    public function create(Request $request)
    {
        return view('login_credential.create');
    }

    public function store(LoginCredentialRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        auth()->login($user);

        $login_token = Str::random(rand(40, 50));
        while(LoginCredential::where('login_token', $login_token)->exists()){
            dump('a');
            $login_token = Str::random(rand(40, 50));
        }

        LoginCredential::create([
            'user_id' => auth()->id(),
            'login_token' => $login_token,
            'agent' => $request->header('User-Agent'),
            'ip' => $request->ip(), // cloudfrontを経由している場合は取得できない
        ]);
        // return to_route('') 図書館内の書籍一覧へ
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return to_route('login_credential.create');
    }
}
