<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{ $library->title }}返したンゴやで！<br>
    <a href="{{ route('library_review.create',['library' => $library->id, 'library_history' => $library_history->id]) }}">レビューする</a>
    <a href="{{ route('library.index') }}">一覧に戻る</a>
</body>
</html>