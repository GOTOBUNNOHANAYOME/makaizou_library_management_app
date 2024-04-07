<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="authentication_token" value="{{ request()->authentication_token }}"><br>
        画像<input type="file" name="image" accept="image/png, image/jpeg, image/gif, image/webp" value="{{ old('image') }}"><br>
        名前<input type="text" name="name" value="{{ old('name') }}"><br>
        電話番号<input type="text" name="phone_number" value="{{ old('phone_number') }}"><br>
        誕生日<input type="date" name="birthday" value="{{ old('birthday') }}"><br>
        性別<select name="gender" value="{{ old('gender') }}">
            <option value="" selected hidden>選択してください</option>
            @foreach(\App\Enums\Gender::asSelectArray() as $key => $gender)
                <option value="{{ $key }}">{{ $gender }}</option>
            @endforeach
        </select><br>
        都道府県<select name="prefecture" value="{{ old('prefecture') }}">
            <option value="" selected hidden>選択してください</option>
            @foreach(\App\Enums\Prefecture::asSelectArray() as $key => $prefecture)
                <option value="{{ $key }}">{{ $prefecture }}</option>
            @endforeach
        </select><br>
        パスワード<input type="password" name="password" value="{{ old('password') }}"><br>
        パスワード(確認用)<input type="password" name="password_confirmation"><br>
        <input type="submit" value="登録">
    </form>
</body>
</html>