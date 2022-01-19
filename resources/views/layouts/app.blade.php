<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- GOOGLE Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bellota+Text:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Lato:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    {{-- FAVICO --}}
    <link rel="icon" href="{{ asset('images/logo/big_f.png') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- GROWL --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.min.css" integrity="sha512-bHAmDko6dIkQXQGO56+bsFtl7FJEuzQ0qKsB+cpdzmOV0D7ONYYwfV8ub+7yevWSCZgP10lIy7aTW8eKv5IgTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- SELECT2 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- SWEETALERT --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('styles')

<style>



@media (max-width:600px){
    .navbar{
        height: 5rem !important;
    }
}

</style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light sticky-top bg-white">
        {{-- style="background-color: #DCE775;height:4rem;"> --}}
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/logo/foodie_no_bg_2.png') }}" width="80">
                  </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto" style="color: black;font-weight:bolder">
                        <!-- Authentication Links -->
                        @auth
                            <li class="nav-item">
                                <a class="nav-link text-black h5 font-weight-bolder" href="{{ route('home') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-black h5 font-weight-bolder" href="{{ route('storeroom.index') }}">{{ __('Store Room') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-black h5 font-weight-bolder" href="{{ route('nutritions.index') }}">{{ __('Nutritions') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-black h5 font-weight-bolder" href="{{ route('grocery.index') }}">{{ __('Grocery List') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-black h5 font-weight-bolder" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Recipes
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-black h5 font-weight-bolder" href="{{ route('recipes.index') }}">{{ __('Search Recipes') }}</a>
                                    <a class="dropdown-item text-black h5 font-weight-bolder" href="{{ route('recipes.create') }}">{{ __('Add your own recipe') }}</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-black h5 font-weight-bolder" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Know More
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-black h5 font-weight-bolder" href="{{ route('about') }}">{{ __('About') }}</a>
                                    <a class="dropdown-item text-black h5 font-weight-bolder" href="{{ route('contact') }}">{{ __('Contact') }}</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-black h5 font-weight-bolder" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-black h5 font-weight-bolder" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-danger h5 font-weight-bolder " href="{{ route('notifications.index') }}"><i class="fas fa-bell text-black"></i>{{auth()->user()->unreadNotifications()->count()}}</a>
                            </li>
                        @else
                            @if (Route::has('login'))
                                <li class="nav-item" style="background-color: rgb(255, 255, 255);border-radius:0.2rem">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item" style="background-color: rgb(255, 255, 255);border-radius:0.2rem;margin-left:0.3rem">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-1">
            @yield('content')
            <a  href="#app"
                title="GO TO TOP"
                class="btn btn-success mb-4 mr-3 rounded-circle "
                id="back-to-top">
                <i class="fas fa-chevron-up"></i>
            </a>
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('js/app.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-smooth-scroll/1.7.1/jquery.smooth-scroll.min.js" integrity="sha512-HbygMe6Ckx5qvr4vcpkuJZNG4+VwsDNub1h6QNgaeR7DSJwk2ZiCQsxgy3Fi7UWiWiTVlzwAa86ILdltKhWtYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- JQUERY VALIDATOR-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('js/MySmoothScroll.js') }}"></script>

    <script>
        $('#back-to-top').hide();
        new MySmoothScroll("#back-to-top");

        $(window).scroll(function () {
            if ($(this).scrollTop() > 60) {
                $('#back-to-top').fadeIn('2500');
                $('.navbar').addClass('shadow');
            } else {
                $('#back-to-top').fadeOut('2500');
                $('.navbar').removeClass('shadow');
            }
        });
    </script>

    {{-- GROWL --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.min.js" integrity="sha512-h77yzL/LvCeAE601Z5RzkoG7dJdiv4KsNkZ9Urf1gokYxOqtt2RVKb8sNQEKqllZbced82QB7+qiDAmRwxVWLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function popUpMessage(colorTheme, message) {
            $.jGrowl(message,
                {
                    theme: colorTheme
                }
            );
        }
    </script>
    @if (session()->has('success'))
        <script>
            popUpMessage('bg-success', "{{ session()->get('success') }}" );
        </script>
    @elseif (session()->has('error'))
        <script>
            popUpMessage('bg-danger', "{{ session()->get('error') }}");
        </script>
    @endif

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js" integrity="sha512-RtZU3AyMVArmHLiW0suEZ9McadTdegwbgtiQl5Qqo9kunkVg1ofwueXD8/8wv3Af8jkME3DDe3yLfR8HSJfT2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @yield('scripts')

</body>
</html>


