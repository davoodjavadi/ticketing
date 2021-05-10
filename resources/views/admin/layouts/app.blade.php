<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Ticketing') }}</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="Aothur" content="Davood javadi" />
    <meta name="designer" content="javadi.davood@gmail.com" />
    <meta name="robots" content="index,follow" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!--    <link rel="stylesheet" href="{{-- asset('css/app.css') --}}">-->

    <link href="{{ asset('css/css/ticketing.css') }}" rel="stylesheet" />
</head>
<body>
    <div id="app">
        <div class="col-md-10 col-sm-10">
            <div class="row">
        <nav class="navbar navbar-expand-md navbar-light well well-sm">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav m-auto">
                        <!-- Authentication Links -->
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <span class="dropdown-menu dropdown-menu-left text-right p-2" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('خروج') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </span>
                                </li>

                    </ul>
                </div>
        </nav>
            </div>

        <main>
            @yield('content')
        </main>
        </div>

        <div class="cal-md-2 col-sm-2 sidebar">
            <form>
                <div class="form-grouo">
                <input type="text" placeholder="جستجو" class="form-control mt-3">
                </div>
            </form>
            <br>
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> <span>پیشخوان</span></a>
                </li>
                <li><a href="{{ url('api/new-ticket') }}"><i class="fa fa-circle-o"></i> ارسال  پیام </a></li>
                <li><a href="{{ url('api/my-ticket') }}"><i class="fa fa-circle-o"></i>پیام های من</a></li>
                <li><a href="{{ url('api/home') }}"><i class="fa fa-circle-o"></i>مدیریت پیام ها </a></li>
                <li><a href="{{ url('api/users') }}"><i class="fa fa-circle-o"></i>مدیریت کاربران</a></li>
                <li><a href="{{ url('#') }}"><i class="fa fa-circle-o"></i>--</a></li>
                <li><a href="{{ url('#') }}"><i class="fa fa-circle-o"></i>--</a></li>
                <li><a href="{{ url('#') }}"><i class="fa fa-circle-o"></i>--</a></li>
                <li><a href="{{ url('#') }}"><i class="fa fa-circle-o"></i>--</a></li>
                <li><a href="{{ url('#') }}"><i class="fa fa-circle-o"></i>--</a></li>
            </ul>
        </div>


    </div>
    <script src="{{ mix('js/app.js') }}" ></script>
</body>
</html>
