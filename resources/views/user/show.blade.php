<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('user.edit') }}">自分の情報を更新するやで</a><br>
    <a href="{{ route('user.delete') }}">もう退会したいやで</a><br>
    <a href="{{ route('user.create_password') }}">メアド変更したいやで</a><br>
    <a href="{{ route('user.index') }}">戻るやで</a>
</body>
</html>