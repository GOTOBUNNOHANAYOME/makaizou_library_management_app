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
                    <th class="col-sm-4">タイトル</th>
                    <th class="col-sm-3">著者</th>
                    <th class="col-sm-2">所持数</th>
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
let library_counts = [];

$(document).ready(function() {
    $('#search_button').on('click', function() {
        searchWord = $('#search_word').val();
        url = googleApi+searchWord;
        $.ajax({
            url: url,
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json'
        }).done(function(response) {
            library_counts = [];
            $.ajax({
                url: @json($search_count_url),
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                data: {book_ids : response.items.map(item => item.id)}
            }).done(function(data) {
                library_counts.push(data);
                tbody = $('#tbody');
                tbody.empty();
                response.items.forEach(function(book, index) {
                    title = book.volumeInfo.title;
                    authors = book.volumeInfo.authors ? book.volumeInfo.authors.join(', ') : 'Unknown Author';
                    let row = $('<tr>');
                    row.append('<td>' + (index + 1) + '</td>');
                    row.append('<td>' + title + '</td>');
                    row.append('<td>' + authors + '</td>');
                    if(Number(library_counts[0][book.id]) > 0){
                        row.append('<td id='+ book.id +'>' + library_counts[0][book.id] + '</td>');
                    }else{
                        row.append('<td id='+ book.id +'>' + 0 + '</td>');
                    }
                    row.append('<td><button class="btn btn-primary library_add_button" data-book-id="' + book.id + '" name="' + book.id + '">追加</button></td>');

                    tbody.append(row);
                });
            });
        });
    });
});

$(document).ready(function() {
    $('#search_word').keypress(function(event) {
        if (event.which === 13) {
            $('#search_button').click();
        }
    }); 
});

$(document).ready(function() {
    $(document).on('click', '.library_add_button', function(){
    let bookId = $(this).data('book-id');
        requestData = {
            book_id : bookId
        }

        $.ajax({
            url: @json($redirect_url),
            type: 'POST',
            data: requestData,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        }).done(function(data) {
            $('#' + bookId).text(data[0]);
        })
    }); 
});
</script>
@endsection