<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('user.update') }}" method="POST">
        @csrf
        画像<input type="file" name="image" accept="image/png, image/jpeg, image/gif, image/webp" value="{{ old('image') }}"><br>
        名前<input type="text" name="name" value="{{ $user->name }}"><br>
        誕生日<input type="date" name="birthday" value="{{ $user->birthday }}"><br>
        性別<select name="gender" value="{{ old('gender') }}">
            <option value="" hidden>選択してください</option>
            @foreach(\App\Enums\Gender::asSelectArray() as $key => $gender)
                @if($key === $user->gender)
                    <option value="{{ $key }}" selected>{{ $gender }}</option>
                @else
                    <option value="{{ $key }}">{{ $gender }}</option>
                @endif
            @endforeach
        </select><br>
        都道府県<select name="prefecture" value="{{ old('prefecture') }}">
            <option value="" hidden>選択してください</option>
            @foreach(\App\Enums\Prefecture::asSelectArray() as $key => $prefecture)
                @if($key === $user->prefecture)
                    <option value="{{ $key }}" selected>{{ $prefecture }}</option>
                @else
                    <option value="{{ $key }}">{{ $prefecture }}</option>
                @endif
            @endforeach
        </select><br>
        <input type="submit" value="更新">
    </form>
    <a href="{{ route('user.show') }}">やっぱ変えたくないやで</a><br>
    @if(!$errors->isEmpty())
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif
</body>
</html>