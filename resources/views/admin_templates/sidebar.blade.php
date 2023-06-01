 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{ asset('admin/index3.html') }}" class="brand-link">
         <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">Admin Studio</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item">
                     <a href="/admin/dashboard" class="nav-link">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>

                 <li class="nav-header">MASTER DATA</li>
                 <li class="nav-item">
                     <a href="/admin/packets" class="nav-link">
                         <i class="nav-icon far fa-calendar-alt"></i>
                         <p>
                             Paket Foto
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="/admin/galleries" class="nav-link">
                         <i class="nav-icon far fa-image"></i>
                         <p>
                             Galeri Foto
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="/admin/studios" class="nav-link">
                         <i class="nav-icon fas fa-columns"></i>
                         <p>
                             Paket Studio
                         </p>
                     </a>
                 </li>

                 <li class="nav-header">TRANSAKSI</li>
                 <li class="nav-item">
                     <a href="{{ asset('admin/iframe.html') }}" class="nav-link">
                         <i class="nav-icon fas fa-ellipsis-h"></i>
                         <p>Pesanan</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="https://adminlte.io/docs/3.1/" class="nav-link">
                         <i class="nav-icon fas fa-file"></i>
                         <p>Pembayaran</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="https://adminlte.io/docs/3.1/" class="nav-link">
                         <i class="nav-icon fas fa-file"></i>
                         <p>Pesanan Selesai</p>
                     </a>
                 </li>
                 <li class="nav-header">PENGATURAN</li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="fas fa-circle nav-icon"></i>
                         <p>Pelanggan</p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="{{ url('admin/brands') }}" class="nav-link">
                         <i class="fas fa-circle nav-icon"></i>
                         <p>Landing Page</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('auth/logout') }}" class="nav-link">
                         <i class="nav-icon fas fa-upload"></i>
                         <p>
                             Keluar
                         </p>
                     </a>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
