<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{$title}}</title>
</head>
<link rel="stylesheet" href="{{asset('css/app.css')}}">

<link rel="stylesheet" href="{{asset('css/style.css')}}">

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="col-6 navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Главная<span class="sr-only">(current)</span></a>
            </li>
{{--            <li class="nav-item active offset-lg-3">--}}
{{--                <a class="nav-link" href="{{route('department.create')}}">Добавить организацию<span class="sr-only ">(current)</span></a>--}}
{{--            </li>--}}

        </ul>

        {{--        <ul class="navbar-nav ml-auto">--}}
        {{--            <!-- Authentication Links -->--}}
        {{--            @guest--}}
        {{--                <li class="nav-item">--}}
        {{--                    <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>--}}
        {{--                </li>--}}
        {{--                @if (Route::has('register'))--}}
        {{--                    <li class="nav-item">--}}
        {{--                        <a class="nav-link" href="{{ route('register') }}">{{ __('Зарегистрироваться') }}</a>--}}
        {{--                    </li>--}}
        {{--                @endif--}}
        {{--            @else--}}
        {{--                <li class="nav-item dropdown">--}}
        {{--                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
        {{--                        {{ Auth::user()->name }} <span class="caret"></span>--}}
        {{--                    </a>--}}

        {{--                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
        {{--                        <a class="dropdown-item" href="{{ route('logout') }}"--}}
        {{--                           onclick="event.preventDefault();--}}
        {{--                                                     document.getElementById('logout-form').submit();">--}}
        {{--                            {{ __('Выйти') }}--}}
        {{--                        </a>--}}

        {{--                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
        {{--                            @csrf--}}
        {{--                        </form>--}}
        {{--                    </div>--}}
        {{--                </li>--}}
        {{--            @endguest--}}
        {{--        </ul>--}}

    </div>
</nav>

<div class="container">
    Поиск <input type="text" id="input" class="input" />
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show " role="alert">
                {{$error}}
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
        @endforeach
    @endif

    @yield('content')


</div>
<script src="{{asset('js/app.js')}}"></script>
<script src ="{{asset('js/search.js')}}"></script>
</body>
</html>
