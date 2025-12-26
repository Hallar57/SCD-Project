<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container-fluid">
        <a id="navbar-button" class="navbar-brand fw-bold" href="{{route('home')}}">
            Home
        </a>
        <a id="navbar-button" class="nav-link-custom navbar-brand fw-bold" href="{{ route('admin.home') }}">
            Admin Panel
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center gap-2">
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="mb-0">
                            @csrf
                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                            >
                                <b>Logout</b>
                            </button>
                        </form>
                    </li>
            </ul>
        </div>
    </div>
</nav>
