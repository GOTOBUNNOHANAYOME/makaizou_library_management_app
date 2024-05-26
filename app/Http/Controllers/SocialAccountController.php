<?php

namespace App\Http\Controllers;

use App\Enums\SocialAccountType;
use App\Models\{
    User,
    SocialAccount
};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialAccountController extends Controller
{
    public function create(Request $request, string $type)
    {
        return Socialite::driver($type)->redirect();
    }

    public function store(Request $request, string $type)
    {
        try{
            $social_user = Socialite::with($type)->user();
            $user = User::create([
                'name'               => $social_user->name,
                'email'              => $social_user->email,
                'icon_image_path'    => $social_user->avatar,
                'archive_image_path' => $social_user->avatar,
                'is_enable'          => true,
            ]);
            $user->socialAccounts()->create([
                'user_id'       => $user->id,
                'type'          => $type,
                'provider_name' => $social_user->nickname,
                'provider_id'   => $social_user->id,
            ]);

            auth()->login($user);

            return to_route('library.index');
        }catch(\Exception $e){
            return to_route('login_credential.create');
        }
    }
}
