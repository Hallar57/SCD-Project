<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container-fluid">

    <a id="navbar-button" class="navbar-brand fw-bold" href="{{route('home')}}">
        Home
    </a>
        @auth
            @if(auth()->user()->role === 'admin')
                    <a  id="navbar-button" href="{{ route('admin.home') }}"
                       class="navbar-brand fw-bold">
                        Admin Panel
                    </a>
            @endif
        @endauth

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center gap-2">

            @guest
                <li class="nav-item">
                    <a class="btn btn-outline-light btn-sm ms-1" href="{{route('login')}}">
                        <b>Login</b></a>
                </li>

                <li class="nav-item">
                    <a class="btn btn-outline-light btn-sm ms-1" href="{{route('registration')}}"><b>Register</b></a>
                </li>
            @endguest

            @auth
                    <li class="nav-item">
                        <form action="{{route('cart.index')}}" method="GET" class="mb-0">
                            @csrf
                            <button type="submit"
                                    style="color: #f61500"
                                    class="btn navbar-right btn-light btn-sm">
                                <b>Cart</b>
                            </button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form action="{{route('logout')}}" method="GET" class="mb-0">
                            @csrf
                            <button type="submit"
                                    style="background: #871f1f; color: white"
                                    class="btn navbar-right btn-sm">
                                <b>Logout</b>
                            </button>
                        </form>
                    </li>

            @endauth

            </ul>
        </div>
    </div>
</nav>
