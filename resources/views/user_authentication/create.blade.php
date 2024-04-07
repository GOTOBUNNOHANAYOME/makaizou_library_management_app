<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('user_authentication.store') }}" method="POST">
        @csrf
        <input type="hidden" value="{{ $type }}">
        Email
        <input type="text" name="email" value="{{ old('email') }}">
        Email確認用
        <input type="text" name="email_confirmation" value="{{ old('email_confirmation') }}">
        <input type="submit" value="送信">
    </form>
</body>
</html>