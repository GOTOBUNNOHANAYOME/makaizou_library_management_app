<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    本:{{ $library->title }}<br>

    @if(isset($library_reviews))
        @foreach($library_reviews as $library_review)
            {{ \App\Models\User::where('id', $library_review->user_id)->value('name') }}さんのコメントでやんごで！:
            {{ $library_review->comment }}<br>
        @endforeach
    @endif
    <a href="{{ route('library.index') }}">一覧に戻る</a>
</body>
</html>