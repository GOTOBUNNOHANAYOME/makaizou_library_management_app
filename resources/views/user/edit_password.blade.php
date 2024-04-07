<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('user.update_password') }}">
        <input type="hidden" value="{{ request()->authentication_token }}">
        新しいパスワード<br>
        <input type="password" name="password">
        新しいパスワード(確認用)<br>
        <input type="password" name="password_confirmation">
    </form>
</body>
</html>