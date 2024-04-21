@extends('admin.layout.app')

@section('header')
        メールサーバーの設定
@endsection

@section('content')
    <form action="{{ route('admin.mail_send.update') }}" method="POST">
        @csrf
        @method('put')
        プロトコル<br>
        <input type="text" name="mail_mailer" class="form-controll" value="{{ is_null(old('mail_mailer')) ? $mail_mailer : old('mail_mailer') }}"><br>
        ホスト<br>
        <input type="text" name="mail_host" class="form-controll" value="{{ is_null(old('mail_host')) ? $mail_host : old('mail_host') }}"><br>
        ポート<br>
        <input type="text" name="mail_port" class="form-controll" value="{{ is_null(old('mail_port')) ? $mail_port : old('mail_port') }}"><br>
        ユーザーネーム<br>
        <input type="text" name="mail_username" class="form-controll" value="{{ is_null(old('mail_username')) ? $mail_username : old('mail_username') }}"><br>
        パスワード<br>
        <input type="text" name="mail_password" class="form-controll" value="{{ is_null(old('mail_password')) ? $mail_password : old('mail_password') }}"><br>
        <input type="submit" value="送信">
    </form>
@endsection