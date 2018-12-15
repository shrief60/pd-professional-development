<nav class="navbar navbar-expand-md" id="main-navbar">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ img('logo') }}" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false"
        aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

    <div class="collapse navbar-collapse" id="navbar">

        <ul class="navbar-nav ml-auto align-items-center">

            <li class="nav-item" id="search-navbar">
                <img src="{{ getImageIcon('search') }}" class="icon" />
                <input type="text" name="term" class="form-control" placeholder="Search for resouces and help">
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}"> Home </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('learner.courses.index') }}"> Courses </a>
            </li>

            @auth

            <li class="nav-item dropdown">
                <a id="user-profile" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                        <img src="{{ Auth::user()->avatar}}" class="avatar">
                        <span> {{ Auth::user()->name }} </span>
                        <img src="{{ getImageIcon('down-arrow') }}" class="dropdown">
                    </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('/profile') }}"> Profile </a>
                    <a class="dropdown-item" href="{{ url('/logout') }}"> Logout </a>
                </div>
            </li>

            @endauth
        </ul>
    </div>
</nav>
