
var/www/html下で
```
git clone https://github.com/GOTOBUNNOHANAYOME/makaizou_library_management_app.git
```
```
cd makaizou_library_management_app
cp .env.example .env
npm install
php artisan key:generate
npm run dev
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

<hr>

### よく使うGitコマンドの一覧


| コマンド      　　　　　　　　　　　　           | 動作  　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　                         |
| ------------------------------------------------- | --------------------------------------------------------------------------------------------------- |
| git status   |コミット前の変更内容を表示<br>赤く表示されたファイルがステージング前の変更したファイル<br>緑で表示されたファイルがステージング済みの変更したファイル<br>ステージングしてコミットすると無くなる                                         |
| git add .        |変更内容をステージング(コミット前の準備)　<br>※ステージングだけではブランチに保存されないので注意|
| git commit -m 'コメント'  |ステージング内容をコミット(ローカルブランチに変更内容を保存)                                 |
| git push origin ローカルブランチ名   |現在の作業中のブランチをリモートに上げる<br>1回目:プルリクエストの作成 <br>2回目以降:プルリクエストを更新                                       |
| git pull origin リモートブランチ名|リモートブランチをローカルリポジトリにコピー                                          |
| git checkout -b 新規ローカルブランチ名 main   |新しくローカルブランチを作成&作業するブランチをその作成したブランチに切り替え|
| git switch ローカルブランチ名   |作業するローカルブランチを切り替え|
| git branch |ローカルブランチの一覧を表示する                                          |
| git branch -a   |ローカルブランチ&リモートブランチの一覧を表示する                                          |
| git stash -u -m 'コメント'| コミット前の変更内容を一旦コミットせずに退避させる。作業中に別ブランチで作業する場合に使う。<br>例:git stash -u -m '〇〇処理の作成途中'                                        |
|git stash list|退避させているスタッシュの一覧表示|
|git stash pop 'スタッシュ名'|現在のブランチに退避させているスタッシュを追加<br>スタッシュ名はgit stash listで確認する。<br>例:git stash pop 'stash@{0}'|

