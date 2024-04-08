<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('library_review.store') }}" method="POST">
    @csrf
    <input type="hidden" name="library_id" value="{{ $library->id }}">
    <input type="hidden" name="library_history_id" value="{{ $library_history->id }}">
    コメント欄やで<br><textarea name="comment"></textarea><br>
    星の数つけるやで<br><input type="number" name="score" min="0" max="5"><br>
    <input type="submit" value="投稿">
    </form>
    <a href="{{ route('library.index') }}">もうレビューなんかせず一覧に戻りたいやで！</a>
</body>
</html>