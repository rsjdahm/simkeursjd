<nav class="navbar navbar-top fixed-top navbar-expand navbar-dark bg-primary">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Search form -->
            {{-- <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                <div class="form-group mb-0">
                    <div class="input-group input-group-alternative input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input class="form-control"
                            placeholder="Cari Kode Rekening, No. Bukti GU, dan lain-lain di sini.." type="text">
                    </div>
                </div>
                <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main"
                    aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </form> --}}
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center ml-md-auto">
                <li class="nav-item px-1 d-xl-none">
                    <!-- Sidenav toggler -->
                    <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                        data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-icon btn-sm btn-secondary" data-toggle="tooltip"
                        data-placement="bottom" title="{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM YYYY') }}">
                        <span class="btn-inner--icon"><i class="fas fa-clock"></i></span>
                        <span data-toggle="clock" class="btn-inner--text">{{
                            \Carbon\Carbon::now()->format('H:i:s')
                            }}</span>
                    </button>
                </li>
            </ul>
            <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link ml-3 pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="{{ asset('assets/img/profile.webp') }}">
                            </span>
                            {{-- <div class="media-body ml-2 d-none d-lg-block"> --}}
                                <div class="media-body ml-2 d-block">
                                    <span class="d-block m-0 p-0 text-sm font-weight-bold">{{
                                        Str::upper(Auth::user()->nama)
                                        }}</span>
                                    <small class="d-block m-0 p-0">{{ Auth::user()->jabatan }}</small>
                                </div>
                            </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        {{-- <a href="#!" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>My profile</span>
                        </a> --}}
                        <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>