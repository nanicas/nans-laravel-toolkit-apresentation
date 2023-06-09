<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @vite(['resources/presentation_template/sass/app.scss'])
    
    <link href="{{ asset('build/vendor/select2/custom.css') }}" rel="stylesheet">
    <link href="{{ asset($packaged_assets_prefix . '/css/layouts/app.css') }}" rel="stylesheet">

    @if(!empty($assets['css']))
        @foreach ($assets['css'] as $css)
            <link rel="stylesheet" href="{{ asset($css) }}"></link>
        @endforeach
    @endif
    
    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                @yield('app_logo', View::make('components.app_logo'))
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrar-se</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Sair
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container-fluid">
                <div id="top-message"></div>
            </div>
            
            @yield('content')
            
            <div class="container-fluid">
                <div id="bottom-message"></div>
            </div>
        </main>
    </div>
</body>

@vite([
    'resources/presentation_template/js/app.js',
])

<!-- Scripts -->
<script type="text/javascript" src="{{ asset('build/vendor/select2/i18n/pt-BR.js') }}" defer></script>
<script type="text/javascript" src="{{ asset($packaged_assets_prefix . '/js/layouts/app.js') }}" defer></script>
<script type="text/javascript" src="{{ asset($packaged_assets_prefix. '/js/utils/helper.js') }}" defer></script>

@if(!empty($assets['js']))
    @foreach ($assets['js'] as $js)
        <script type="text/javascript" src="{{ asset($js) }}" defer></script>
    @endforeach
@endif

@yield('js')
</html>
