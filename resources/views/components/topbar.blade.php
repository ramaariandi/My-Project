<!-- TO DO: complete our navbar and headbar -->

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="navbar-brand" href="#">
                        <h4 class="text-white" style="font-weight: bold;">Invest Yuk!</h4>
                        @if (session()->has('id'))
                        <p class="text-white" style="font-weight: bold;">{{session()->get('name')}}</p>
                        <a class="btn btn-outline-warning" href="{{route('logout')}}">Logout</a>
                        @else
                        <p class="text-white"> -- Belum Login --</p>
                        @endif
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>