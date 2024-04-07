<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    パスワードをリセットするやで！<br>
    <a href="{{ route('user.edit_password', $authentication_token) }}">{{ route('user.edit_password', $authentication_token) }}</a>
</body>
</html>