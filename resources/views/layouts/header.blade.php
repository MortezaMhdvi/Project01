<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @else
                    <div class="mt-1">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </div>
                    <li class="nav-item">
                        <a id="navbarDropdown" class="nav-link" href="" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                    </li>
                    <li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">اطلاعات
                            پایه</a>
                        <ul class="dropdown-menu">
                            {{--                            @can('index-user')--}}
                            <li><a class="dropdown-item" href="{{route('users.index')}}">کاربران</a></li>
                            {{--                            @endcan--}}

                            {{--                            @can('index-role')--}}
                            <li><a class="dropdown-item" href="{{route('role.index')}}">سطوح دسترسی</a></li>
                            {{--                            @endcan--}}
                            <li><a class="dropdown-item" href="{{route('label.index')}}">label</a></li>

                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">سفارش</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('customer.index')}}">مشتری</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">تولید</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('phaseProfile.index')}}">گروه مرحله تولید</a>
                            </li>
                            <li><a class="dropdown-item" href="{{route('buildPhase.index')}}">مرحله تولید</a></li>
                            <li><a class="dropdown-item" href="{{route('machine.index')}}">دستگاه</a></li>
                            <li><a class="dropdown-item" href="{{route('parameter.index')}}">پارامتر</a></li>
                            <li><a class="dropdown-item" href="{{route('barcode.index')}}">بارکد</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">انبار</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('product.index')}}">محصول</a>
                            </li>
                            <li><a class="dropdown-item" href="{{route('order.index')}}">سفارش</a>
                            </li>
                        </ul>
                    </li>

                @endguest
            </ul>
        </div>
    </div>
</nav>
