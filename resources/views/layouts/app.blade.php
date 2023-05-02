<!doctype html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@lang('main.home')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <header class="pb-2">
        <div class="row">
            <div class="row col-6 text-center">
                <div class="col-6">
                    <a href="{{route('home')}}">@lang('main.home')</a>
                </div>
                <div class="col-6">
                    <a href="{{route('blog')}}">@lang('main.blog')</a>
                </div>
            </div>
            <div class="row col-6 text-end ">
                <div class="col">
                    <a href="https://github.com/milkoutside">
                        <i class="fa-brands fa-github fa-xl" style="color: #ffffff;"></i>
                    </a>
                </div>
               <div class="col">
                   <a href="https://t.me/eboshimo ">
                       <i class="fa-brands fa-telegram fa-xl" style="color: #ffffff;"></i>
                   </a></div>
                <div class="col"><a href="{{route('locale','ru')}}">@lang('main.language')</a></div>


            </div>
        </div>
    </header>
    <div class="video-background">
        <video src="{{asset('video/fon.mp4')}}" autoplay loop muted></video>
    </div>
    <div>
        @yield('content')
    </div>
    <script src="https://kit.fontawesome.com/07cf616d63.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        console.log(jQuery);
    </script>
</body>
</html>
