<?php

namespace App\Http\Controllers;

use App\Enums\AuthenticationStatus;
use App\Enums\AuthenticationType;
use App\Models\{
    User,
    UserAuthentication,
};
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\{
    Storage,
    Hash,
};
use Imagick;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $user_authentication = UserAuthentication::where('authentication_token', $request->authentication_token)
            ->where('expired_at', '>', now())
            ->where('status', AuthenticationType::CREATE_USER)
            ->first();

        if (is_null($user_authentication)) {
            return to_route('login_credential.create');
        }

        return view('user.create', 
            ['email' => $user_authentication->email]
        );
    }

    public function store(UserRequest $request)
    {
        $user_authentication = UserAuthentication::where('authentication_token', $request->authentication_token)
            ->where('expired_at','>', now())
            ->where('status', AuthenticationStatus::TEMPORARY)
            ->where('type', AuthenticationType::CREATE_USER)
            ->first();

        if (is_null($user_authentication)) {
            return to_route('login_credential.create');
        }
        
        $image_paths = $this->imageResize($request->image);

        User::create([
            'name' => $request->name,
            'email'=> $user_authentication->email,
            'password' => Hash::make($request->password),
            'prefecture'=> $request->prefecture,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'birthday' => $request->birthday,
            'archive_image_path' => $image_paths['archive_image_path'],
            'icon_image_path' => $image_paths['icon_image_path']
        ]);

        return to_route('user.complete');
    }

    public function complete(Request $request)
    {
        return view('user.complete');
    }

    private function imageResize($image_file)
    {
        $image = new Imagick();
        $image->readImage($image_file);

        $archive_extension = config('mimetypes')[$image->getImageMimetype()];
        
        $archive_image_path = Str::random(rand(20, 50)).$archive_extension;
        while(User::where('archive_image_path', $archive_image_path)->exists()){
            $archive_image_path = Str::random(rand(20, 50)).$archive_extension;
        }

        if(!is_null($image->getImageProperties("exif:*"))){
            $image->stripImage();
        }

        Storage::put('public/user/archive_images/'.$archive_image_path, $image);

        $icon_image_path = Str::random(rand(20, 50)).'.webp';
        while(User::where('icon_image_path', $icon_image_path)->exists()){
            $icon_image_path = Str::random(rand(20, 50)).'.webp';
        }

        if($archive_extension !== '.webp'){
            $image->setImageFormat('webp');
        } 
        $image->resizeImage(200, 200, Imagick::FILTER_LANCZOS, 1);

        Storage::put('public/user/icon_images/'.$icon_image_path, $image);
        
        $image->clear();

        return [
            'archive_image_path' => $archive_image_path,
            'icon_image_path'    => $icon_image_path
        ];
    }
}
