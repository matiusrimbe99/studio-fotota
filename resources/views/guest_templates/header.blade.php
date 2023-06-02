<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center">
            <img src="{{ asset('customer/img/logo.png') }}" alt="">
            <span>{{ $brand->brand_name }}</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#pricing">Paket Foto</a></li>
                <li><a class="nav-link scrollto" href="#portfolio">Galeri</a></li>
                <li><a class="nav-link scrollto" href="#recent-blog-posts">Paket Studio</a></li>
                <li><a href="blog.html">Cara Pesan</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                @if (Auth::check() && Auth::user()->role_id === 2)
                    <li class="dropdown"><a href="#"><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">My Order</a></li>
                            <li><a href="#">Edit Profil</a></li>
                            <li><a href="#">Ganti Password</a></li>
                        </ul>
                    </li>
                @endif

                @if (Auth::check() && Auth::user()->role_id === 2)
                    <li><a class="getstarted scrollto" href="{{ url('auth/logout') }}">Logout</a></li>
                @else
                    <li><a class="getstarted scrollto" href="{{ url('auth/login') }}">Login</a></li>
                @endif


            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
