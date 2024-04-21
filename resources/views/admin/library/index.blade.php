@extends('admin.layout.app')

@section('header')
        書籍一覧
@endsection

@section('content')
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th class="col-sm-2">
            <a href="{{ route('admin.library.index', ['sort' => 'id']) }}" class="text-white">
                ID
            </a>
        </th>
        <th class="col-sm-4">
            <a href="{{ route('admin.library.index', ['sort' => 'title']) }}" class="text-white">
                書籍名
            </a>
        </th>
        <th class="col-sm-4">著者</th>
        <th class="col-sm-2">
            <a href="{{ route('admin.library.index', ['sort' => 'published_at']) }}" class="text-white">
                出版日
            </a>
        </th>
      </tr>
    </thead>
    <tbody>
        @foreach ($libraries as $library)
            <tr>
                <th scope="row">{{ $library->id }}</th>
                <td>{{ $library->title }}</td>
                <td>{{ $library->authors }}</td>
                <td>{{ $library->published_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<br>
<div class="container text-center">
{{ $libraries->links() }}
</div>
@endsection