<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    会員登録に進むやで
    <a href="{{ route('user.create', $authentication_token) }}">{{ route('user.create', $authentication_token) }}</a>
</body>
</html>