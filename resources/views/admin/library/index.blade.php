@extends('admin.layout.app')

@section('header')
        書籍登録(Google API)
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-9">
            <div class="form-group">
                検索ワード<input type="text" class="form-control" id="search_word">
            </div>
        </div>
        <div class="col-sm-3 pt-4">
            <div class="text-left">
                <input class="btn btn-primary" type="submit" value="検索" id="search_button">
            </div>
        </div>
    </div>
    <div class="row">
        <p class="small ml-2">最もぽいやつが最大で10件表示されるやで</p>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-dark">
                <thead>
                <tr>
                    <th class="col-sm-1">No</th>
                    <th class="col-sm-6">タイトル</th>
                    <th class="col-sm-3">著者</th>
                    <th class="col-sm-2">&nbsp;</th>
                </tr>
                </thead>
                <tbody id="tbody" class="flow-auto">
                <tr>
                    <td colspan="4">まだ検索されていません。</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    googleApi = @json($google_api);

    $(document).ready(function() {
            $('#search_button').on('click', function() {
                searchWord = $('#search_word').val();
                url = googleApi+searchWord;
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        tbody = $('#tbody');
                        tbody.empty();
                        response.items.forEach(function(book, index) {
                            title = book.volumeInfo.title;
                            authors = book.volumeInfo.authors ? book.volumeInfo.authors.join(', ') : 'Unknown Author';

                            var row = $('<tr>');
                            row.append('<td>' + (index + 1) + '</td>');
                            row.append('<td>' + title + '</td>');
                            row.append('<td>' + authors + '</td>');
                            row.append('<td><button class="btn btn-primary library_add_button" name="' + book.id + '">追加</button></td>');

                            tbody.append(row);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            })
        });

    $(document).ready(function() {
        $('#search_word').keypress(function(event) {
            if (event.which === 13) {
                $('#search_button').click();
            }
        }); 
    });
    $(document).ready(function() {
        $('.add_library_button').on('click', function() {
            
            requestData = {
                book_id : $(this).attr('name')
            }

            $.ajax({
                url: @json($redirect_url),
                type: 'POST',
                data: requestData, // 送信するデータ
                dataType: 'json',
            success: function(response) {
                console.log('Ajaxリクエストが成功しました。レスポンス:', response);
                // 成功時の処理を記述
            },
            error: function(xhr, status, error) {
                console.error('Ajaxリクエストがエラーを返しました。エラー:', error);
                // エラー時の処理を記述
            }
            })
        }); 
    });
</script>
@endsection