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
use App\Mail\{
    CreateUserMail,
    ResetPasswordMail
};

class UserAuthenticationController extends Controller
{
    public function create(Request $request)
    {
        $type = $request->authentication_type;

        return view('user_authentication.create', [
            'type' => $type
        ]);
    }
    public function store(UserAuthenticationRequest $request)
    {
        $authentication_token = Str::random(rand(30, 50));
        while(UserAuthentication::where('authentication_token', $authentication_token)->exists()){
            $authentication_token = Str::random(rand(30, 50));
        }
        
        UserAuthentication::create([
            'email'                => $request->email,
            'authentication_token' => $authentication_token,
            'type'                 => (int)$request->authentication_type === AuthenticationType::CREATE_USER ? AuthenticationType::CREATE_USER : AuthenticationType::RESET_PASSWORD,
            'status'               => AuthenticationStatus::TEMPORARY,
            'expired_at'           => now()->addMinutes(15)
        ]);

        switch($request->authentication_type){
            case AuthenticationType::CREATE_USER:
                Mail::to($request->email)->send(new CreateUserMail($authentication_token));
                break;
            case AuthenticationType::RESET_PASSWORD:
                Mail::to($request->email)->send(new ResetPasswordMail($authentication_token));
                break;
            default:
                return;
        }

        return to_route('login_credential.create');
    }
}
