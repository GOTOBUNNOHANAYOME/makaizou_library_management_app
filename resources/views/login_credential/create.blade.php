<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('login_credential.store') }}" method="POST">
    @csrf
        メールアドレス<input type="text" name="email" value="{{ old('email') }}">
        パスワード<input type="text" name="password" value="{{ old('password') }}">
        <input type="submit" value="login">
    </form>
    @if(!$errors->isEmpty())
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif

    <a href="{{ route('user_authentication.create', \App\Enums\AuthenticationType::CREATE_USER) }}">新規登録</a>
    <br>
    <a href="{{ route('user_authentication.create', \App\Enums\AuthenticationType::CREATE_USER) }}">パスワードをリセット</a>
</body>
</html>