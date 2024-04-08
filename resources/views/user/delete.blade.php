<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    ほんまに退会するンゴか？
    <form action="{{ route('user.destroy') }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="radio" name="can_delete" value="yes">YESンゴや！<br>
        <input type="radio" name="can_delete" value="no">NOンゴや！<br>
        <input type="submit" value="これで決まりや！">
    </form><br>
    @if(!$errors->isEmpty())
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif
</body>
</html>