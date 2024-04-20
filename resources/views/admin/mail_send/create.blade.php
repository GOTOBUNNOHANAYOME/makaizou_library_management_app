@extends('admin.layout.app')

@section('header')
        メール送信
@endsection

@section('content')
    <form action="{{ route('admin.mail_send.store') }}" method="POST">
        @csrf
        タイトル<br>
        <input type="text" name="title"><br>
        本文<br>
        <textarea name="content" id="" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" value="送信">
    </form>
@endsection