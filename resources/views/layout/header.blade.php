<nav class="main-header navbar navbar-expand navbar-primary navbar-dark">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('/') }}" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('users.index') }}" class="nav-link">Users</a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto pr-3">
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt" title="Full Screen"></i>
            </a>
        </li>
        <li class="nav-item">
            {{-- <a class="dropdown-item mb-2" href="{{ route('logout') }}"> --}}
            <a class="dropdown-item mb-2 nav-link" href="#" data-bs-toggle="modal" data-bs-target="#logout">
                <i class="fas fa-sign-out-alt" alt="Logout" title="Logout" style="color: red">
                </i>
            </a>
        </li>
    </ul>
</nav>

<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div align="center" class="modal-body">
                <div class="tanya">
                   <h5>
                    <small>Apakah anda yakin ingin keluar sistem ?</small>
                    </h2>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Batal</button>
                <a href="{{ route('logout') }}" type="button" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>
