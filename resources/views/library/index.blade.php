<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('library.index') }}" method="GET">
        <input type="text" name="search_word">
        <input type="submit" value="search">
    </form>
    <br>
    <a href="{{ route('library_history.index') }}">レンタル履歴一覧</a>

    @if(isset($libraries))
        @foreach ($libraries as $library)
            <a href="{{ route('library.show', $library) }}">{{ $library->title }}</a>
            @if(in_array($library->id, $library_histories))
                <a href="{{ route('library_history.book_return', $library) }}">返却</a>
            @else
                <a href="{{ route('library_history.store', $library) }}">レンタル</a>
            @endif
        @endforeach
    @endif
</body>
</html>