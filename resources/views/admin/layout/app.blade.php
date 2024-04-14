<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-jJ2L/Ujk8jWEwtIXPFEk3X+f20QKnj4IIscn+JZzxqkbAUC79idDdiAhAi2E7czT" crossorigin="anonymous"> --}}
    <script src="https://kit.fontawesome.com/96aa7a02df.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
    @include('admin.side_bar')
    
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            @yield('header')
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid"> 
            @yield('content')
        </div>
    </div>
</body>
@yield('script')
<script>
    $(document).ready(function(){
        $('.nav-item').on('click', function(){
            if($(this).hasClass('menu-open')){
                $(this).removeClass('menu-open');
            }else{
                $('.menu-open').removeClass('menu-open');
                $(this).addClass('menu-open');
            }
        });
    });

    // $(document).ready(function(){
    //     $('.nav-link').on('click', function(){
        
    //         $('.nav-link').removeClass('active');
    //         $(this).addClass('active');

    //     })
    // });
</script>