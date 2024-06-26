<?php

namespace App\Http\Controllers;

use App\Enums\{
    AuthenticationStatus,
    AuthenticationType
};
use App\Models\{
    User,
    UserAuthentication,
};
use App\Http\Requests\{
    UserRequest,
    UserUpdateRequest,
    ResetPasswordRequest,
};
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\{
    Storage,
    Hash,
};
use Imagick;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('user.index', [
            'user'=> auth()->user(),
        ]);
    }
    public function create(Request $request)
    {
        $user_authentication = UserAuthentication::where('authentication_token', $request->authentication_token)
            ->where('expired_at', '>', now())
            ->where('status', AuthenticationStatus::TEMPORARY)
            ->where('type', AuthenticationType::CREATE_USER)
            ->first();

        if (is_null($user_authentication)) {
            return to_route('login_credential.create');
        }

        return view('user.create', [
            'email' => $user_authentication->email
        ]);
    }

    public function store(UserRequest $request)
    {
        $user_authentication = UserAuthentication::where('authentication_token', $request->authentication_token)
            ->where('expired_at', '>', now())
            ->where('status', AuthenticationStatus::TEMPORARY)
            ->where('type', AuthenticationType::CREATE_USER)
            ->first();

        if (is_null($user_authentication)) {
            return to_route('login_credential.create');
        }
        
        $image_paths = $this->imageResize($request->image);

        User::create([
            'name'               => $request->name,
            'email'              => $user_authentication->email,
            'password'           => Hash::make($request->password),
            'prefecture'         => $request->prefecture,
            'gender'             => $request->gender,
            'phone_number'       => $request->phone_number,
            'birthday'           => $request->birthday,
            'archive_image_path' => $image_paths['archive_image_path'],
            'icon_image_path'    => $image_paths['icon_image_path'],
            'is_enable'          => true
        ]);

        $user_authentication->status = AuthenticationStatus::COMPLETED;
        $user_authentication->save();

        return to_route('user.complete');
    }

    public function show(Request $request)
    {
        return view('user.show', [
            'user' => auth()->user()
        ]);
    }

    public function edit(Request $request)
    {
        return view('user.edit', [
            'user' => auth()->user()
        ]);
    }

    public function update(UserUpdateRequest $request)
    {
        $user = User::where('id', auth()->user())
            ->update([
                'name' => $request->name,
                'gender' => $request->gender,
                'birthday'=> $request->birthday,
                'prefecture'=> $request->prefecture,
            ]);
        
        if(!is_null($request->image)){
            $image_paths = $this->imageResize($request->image);
            $user->archive_image_path = $image_paths['archive_image_path'];
            $user->icon_image_path    = $image_paths['icon_image_path'];
            $user->save();
        }

        return to_route('user.config');
    }

    public function delete(Request $request)
    {
        return view('user.delete');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'can_delete' => [
                'required',
                'max:255',
                'string'
            ],
        ], [
            'can_delete.required' => 'どっちか選ばんかい',
            'can_delete.max'      => 'DB潰そうとしとるんけ？',
            'can_delete.string'   => '人生は冒険か？'
        ]);

        if($request->can_delete === 'no'){
            return to_route('user.show');
        }
        $user = auth()->user();
        $user->is_enable = false;
        $user->save();

        return to_route('login_credential.create');
    }

    public function complete(Request $request)
    {
        return view('user.complete');
    }

    public function createPassword(Request $request)
    {
        return view('user_authentication.create',[
            'type' => AuthenticationType::RESET_PASSWORD
        ]);
    }

    public function editPassword(Request $request)
    {
        return view('user.edit_password', [
            'authentication_token' => $request->authentication_token
        ]);
    }

    public function updatePassword(ResetPasswordRequest $request)
    {
        $user_authentication = UserAuthentication::where('authentication_token', $request->authentication_token)
            ->where('expired_at', '>', now())
            ->where('status', AuthenticationStatus::TEMPORARY)
            ->where('type', AuthenticationType::RESET_PASSWORD)
            ->first();

        if(is_null($request->authentication_token)){
            return to_route('login_credential.create');
        }

        $user_authentication->status = AuthenticationStatus::COMPLETED;
        $user_authentication->save();

        User::where('email', $request->email)
            ->update([
                'password'=> Hash::make($request->password),
            ]);

        return to_route('user.complete_reset_password');
    }

    public function completePasswordReset(Request $request)
    {
        return view('user.complete_reset_password');
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
