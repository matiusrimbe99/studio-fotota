<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-cog mr-2"></i> {{ Auth::user()->admin->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Pengaturan Admin</span>
                <div class="dropdown-divider"></div>
                <a href="{{ url('admin/edit-profile') }}" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Ubah Profil

                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ url('admin/change-password') }}" class="dropdown-item">
                    <i class="fas fa-edit mr-2"></i> Ubah Sandi

                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ url('auth/logout') }}" class="dropdown-item">
                    <i class="fas fa-upload mr-2"></i> Keluar

                </a>

            </div>
        </li>
    </ul>
</nav>
