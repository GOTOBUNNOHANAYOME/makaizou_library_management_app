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

    @if(!in_null($libraries))
        @foreach ($libraries as $library)
            <a href="{{ route('library.show', $library) }}">$library->title</a>
        @endforeach
    @endif
</body>
</html>