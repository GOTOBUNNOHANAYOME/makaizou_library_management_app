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
        <input type="text" name="email" value="{{ old('email') }}">
        <input type="text" name="password" value="{{ old('password') }}">
        <input type="submit" value="login">
    </form>
    @if(!$errors->isEmpty())
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif
</body>
</html>