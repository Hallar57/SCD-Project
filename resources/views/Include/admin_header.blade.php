<nav class="navbar navbar-expand-lg bg-secondary ">
    <div class="container-fluid">
        <a class="navbar-brand text-light" href="{{route('admin.home')}}">Name</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                @guest()
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('registration')}}">Registration</a>
                    </li>
                @endguest

                @auth()
                    <li class="nav-item">
                        <form action="{{route('logout')}}" method="GET">
                            @csrf
                            <button class="btn btn-link nav-link" type="submit">Logout</button>
                        </form>
                    </li>


                    <!--<li class="nav-item">
                        <a class="nav-link" href="{ route('profile.edit') }">Profile</a>
                    </li>-->
                @endauth

            </ul>
        </div>
    </div>
</nav>
