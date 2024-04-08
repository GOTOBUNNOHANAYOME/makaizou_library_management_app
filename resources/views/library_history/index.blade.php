<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(isset($library_histories))
        @foreach($library_histories as $library_history)
            {{ $libraries->where('id', $library_history->library_id)->value('title') }}
            {{ $library_history->created_at }}<br>
        @endforeach
    @endif
    <a href="{{ route('library.index') }}">書籍一覧に戻る</a>
</body>
</html>