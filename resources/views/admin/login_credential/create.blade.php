<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>
<body>
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">管理者ログイン画面</h3>
            </div>
            <div class="card-body px-5 mx-5">
                <form action="{{ route('admin.login_credential.store') }}" method="POST">
                    @csrf
                    <div class="px-5 mx-5">
                        <label for="id">ID</label>
                        <input type="text" name="login_id" class="form-control"><br>
                        <label for="password">パスワード</label>
                        <input type="password" name="password" class="form-control"><br>
                        <div class="text-right">
                            <input type="submit" class="btn btn-primary" value="ログイン">
                        </div>
                    </div>
                </form>
            </div>
          </div>
    </div>
</body>
</html>