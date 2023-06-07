 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{ url('admin/dashboard') }}" class="brand-link">
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
                         <i class="nav-icon fa fa-camera-retro"></i>
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
                 <li class="nav-item">
                     <a href="{{ url('admin/customers') }}" class="nav-link">
                         <i class="fas fa-users nav-icon"></i>
                         <p>Pelanggan</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('admin/contacts') }}" class="nav-link">
                         <i class="fas fa-phone nav-icon"></i>
                         <p>Kontak & Rekening</p>
                     </a>
                 </li>

                 <li class="nav-header">TRANSAKSI</li>

                 <li class="nav-item">
                     <a href="{{ url('admin/orders') }}" class="nav-link">
                         <i class="nav-icon fa fa-cart-arrow-down"></i>
                         <p>Pesanan Masuk</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('admin/orders/payments') }}" class="nav-link">
                         <i class="nav-icon fa fa-credit-card"></i>
                         <p>Pembayaran</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('admin/orders/full-payments') }}" class="nav-link">
                         <i class="nav-icon fa fa-check"></i>
                         <p>Pesanan Lunas</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('admin/orders/completed') }}" class="nav-link">
                         <i class="nav-icon fa fa-shopping-cart"></i>
                         <p>Pesanan Selesai</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('admin/orders/all') }}" class="nav-link">
                         <i class="nav-icon fa fa-cart-plus"></i>
                         <p>Semua Pesanan</p>
                     </a>
                 </li>
                 <li class="nav-header">PENGATURAN</li>
                 <li class="nav-item">
                     <a href="{{ url('admin/users') }}" class="nav-link">
                         <i class="fas fa-user nav-icon"></i>
                         <p>Pengguna</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('admin/order-methods') }}" class="nav-link">
                         <i class="fas fa-list nav-icon"></i>
                         <p>Cara Pesan</p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="{{ url('admin/abouts') }}" class="nav-link">
                         <i class="fas fa-copy nav-icon"></i>
                         <p>About Page</p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="{{ url('admin/brands') }}" class="nav-link">
                         <i class="fas fa-copy nav-icon"></i>
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
