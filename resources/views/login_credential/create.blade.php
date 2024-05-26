<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログイン</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">ログイン</div>
                    <div class="card-body">
                        <form action="{{ route('login_credential.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">メールアドレス</label>
                                <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                                @if($errors->has('email'))
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password">パスワード</label>
                                <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" value="{{ old('password') }}">
                            </div>
                            <div class="row">
                                <div class="col-md-6 offset-md-6 text-right">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">ログイン</button>
                                        @if($errors->has('password'))
                                            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>                   
                        </form>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ route('social_account.create', ['type' => \App\Enums\SocialAccountType::GOOGLE]) }}">
                                        <button type="submit" class="btn btn-block" style="background-color: #db4437; color: white;">
                                            Google
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <a href="{{ route('social_account.create', ['type' => \App\Enums\SocialAccountType::GITHUB]) }}">
                                        <button type="submit" class="btn btn-block" style="background-color: #24292e; color: white;">GitHub</button>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <a href="{{ route('social_account.create', ['type' => \App\Enums\SocialAccountType::X]) }}">
                                        <button type="submit" class="btn btn-block" style="background-color: #24292e; color: white;">X</button>
                                    </a>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('user_authentication.create', \App\Enums\AuthenticationType::CREATE_USER) }}" class="btn btn-link">新規登録</a>
                    <a href="{{ route('user_authentication.create', \App\Enums\AuthenticationType::RESET_PASSWORD) }}" class="btn btn-link">パスワードをリセット</a>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>