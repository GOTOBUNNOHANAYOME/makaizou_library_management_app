<?php

namespace App\Http\Controllers;

use App\Enums\{
    AuthenticationStatus,
    AuthenticationType
};
use App\Models\UserAuthentication;
use App\Http\Requests\UserAuthenticationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\CreateUserMail;

class UserAuthenticationController extends Controller
{
    public function create(Request $request)
    {
        return view('user_authentication.create', 
            ['type' => AuthenticationType::CREATE_USER]
        );
    }
    public function store(UserAuthenticationRequest $request)
    {
        $authentication_token = Str::random(rand(30, 50));
        while(UserAuthentication::where('authentication_token', $authentication_token)->exists()){
            $authentication_token = Str::random(rand(30, 50));
        }

        UserAuthentication::create([
            'email' => $request->email,
            'authentication_token' => $authentication_token,
            'type' => AuthenticationType::CREATE_USER,
            'status' => AuthenticationStatus::TEMPORARY,
            'expired_at' => now()->addMinutes(15)
        ]);

        Mail::to($request->email)->send(new CreateUserMail($authentication_token));

        return to_route('login_credential.create');
    }
}
