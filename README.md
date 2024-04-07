### よく使うGitコマンドの一覧

| コマンド      　　　　　　　　　　　　           | 動作  　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　                         |
| ------------------------------------------------- | --------------------------------------------------------------------------------------------------- |
| git status   |コミット前の変更内容を表示<br>赤く表示されたファイルがステージング前の変更したファイル<br>緑で表示されたファイルがステージング済みの変更したファイル<br>ステージングしてコミットすると無くなる                                         |
| git add .        |変更内容をステージング(コミット前の準備)　<br>※ステージングだけではブランチに保存されないので注意|
| git commit -m 'コメント'  |ステージング内容をコミット(ローカルブランチに変更内容を保存) <br> ※コメントは必須 例:git commit -m '〇〇処理の追加'                                         |
| git push origin ローカルブランチ名   |現在の作業中のブランチをリモートに上げる<br>1回目:プルリクエストの作成 <br>2回目以降:プルリクエストを更新<br>プルリクエストの作成は※1参照                                       |
| git pull origin リモートブランチ名|リモートブランチをローカルリポジトリにコピー                                          |
| git checkout -b 新規ローカルブランチ名 main   |新しくローカルブランチを作成&作業するブランチをその作成したブランチに切り替え<br>作成したブランチはリモートリポジトリのmainがコピーされる<br>基本はfeature/〇〇と命名する|
| git switch ローカルブランチ名   |作業するローカルブランチを切り替え <br>例:git switch feature/userAdd|
| git branch |ローカルブランチの一覧を表示する                                          |
| git branch -a   |ローカルブランチ&リモートブランチの一覧を表示する                                          |
| git stash -u -m 'コメント'| コミット前の変更内容を一旦コミットせずに退避させる。作業中に別ブランチで作業する場合に使う。<br>例:git stash -u -m '〇〇処理の作成途中'                                        |
|git stash list|退避させているスタッシュの一覧表示|
|git stash apply 'スタッシュ名'|現在のブランチに退避させているスタッシュを追加<br>スタッシュ名はgit stash listで確認する。<br>例:git stash apply 'stash@{0}'|


※1プルリクエストの作成
ローカルブランチをプッシュ後、Githubのサイトでcompare & create pull resquestsからプルリクエストを作成する

<hr>
var/www/html下で
```
git clone https://github.com/GOTOBUNNOHANAYOME/makaizou_library_management_app.git
```
```
cd makaizou_library_management_app
```
var/www/html/makaizou_library_management_app下で
```
chmod -R 775 storage/logs
chmod -R 777 storage
```
```
cp .env.example .env
npm install
php artisan key:generate
npm run dev
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```
```
apt install nodejs npm
```
/var/www/html/makaizou_library_management_app/内で
```
composer require laravel/ui
php artisan ui react
npm install && nohup npm run dev &
```
別のターミナル開いて/var/www/html/makaizou_library_management_app/内で
```
npm install --save-dev ts-loader typescript react-router-dom @types/react @types/react-dom @types/react-router-dom
```
```
npx tsc --init
```
<hr>
スプレッドシート
https://docs.google.com/spreadsheets/d/1sA4U0zTgiKbjZSy7-kswvCKDYP2lLDE53fUA8OdRIOM/edit#gid=1748048429<br>
要件定義参考サイト
https://qiita.com/syantien/items/9a8a7cbaeca2be3ef0d7<br>
Miro<br> https://miro.com/welcomeonboard/Z1piNzhSV0RhaEJLd3lHZFkwOUNKdHdHQzZDTHV6TGNUMHJaQjZsZG92cDlPTnN2MlU3RHJ2Q2NCWFJFbkx1U3wzNDU4NzY0NTU4MzQ2NzYxNDY2fDI=?share_link_id=110148994627
