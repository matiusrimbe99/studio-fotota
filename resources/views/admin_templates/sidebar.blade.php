 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{ url('admin/dashboard') }}" class="brand-link">
         <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">Admin Studio</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         @php
             $currentUrl = Request::url();
         @endphp
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item">
                     <a href="/admin/dashboard"
                         class="nav-link {{ $currentUrl == url('/admin/dashboard') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>

                 <li class="nav-header">MASTER DATA</li>
                 <li class="nav-item">
                     <a href="/admin/packets"
                         class="nav-link {{ $currentUrl == url('/admin/packets') ? 'active' : '' }}">
                         <i class="nav-icon fa fa-camera-retro"></i>
                         <p>
                             Paket Foto
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="/admin/galleries"
                         class="nav-link {{ $currentUrl == url('/admin/galleries') ? 'active' : '' }}">
                         <i class="nav-icon far fa-image"></i>
                         <p>
                             Galeri Foto
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="/admin/studios"
                         class="nav-link {{ $currentUrl == url('/admin/studios') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-columns"></i>
                         <p>
                             Paket Studio
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('admin/customers') }}"
                         class="nav-link {{ $currentUrl == url('admin/customers') ? 'active' : '' }}">
                         <i class="fas fa-users nav-icon"></i>
                         <p>Pelanggan</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('admin/contacts') }}"
                         class="nav-link {{ $currentUrl == url('admin/contacts') ? 'active' : '' }}">
                         <i class="fas fa-phone nav-icon"></i>
                         <p>Kontak & Rekening</p>
                     </a>
                 </li>

                 <li class="nav-header">TRANSAKSI</li>

                 <li class="nav-item">
                     <a href="{{ url('admin/orders') }}"
                         class="nav-link {{ $currentUrl == url('admin/orders') ? 'active' : '' }}">
                         <i class="nav-icon fa fa-cart-arrow-down"></i>
                         <p>Pesanan Masuk</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('admin/orders/full-payments') }}"
                         class="nav-link {{ $currentUrl == url('admin/orders/full-payments') ? 'active' : '' }}">
                         <i class="nav-icon fa fa-check"></i>
                         <p>Pembayaran</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('admin/orders/completed') }}"
                         class="nav-link {{ $currentUrl == url('admin/orders/completed') ? 'active' : '' }}">
                         <i class="nav-icon fa fa-shopping-cart"></i>
                         <p>Pesanan Selesai</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('admin/orders/all') }}"
                         class="nav-link {{ $currentUrl == url('admin/orders/all') ? 'active' : '' }}">
                         <i class="nav-icon fa fa-cart-plus"></i>
                         <p>Semua Pesanan</p>
                     </a>
                 </li>
                 <li class="nav-header">PENGATURAN</li>
                 <li class="nav-item">
                     <a href="{{ url('admin/users') }}"
                         class="nav-link {{ $currentUrl == url('admin/users') ? 'active' : '' }}">
                         <i class="fas fa-user nav-icon"></i>
                         <p>Pengguna</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('admin/order-methods') }}"
                         class="nav-link {{ $currentUrl == url('admin/order-methods') ? 'active' : '' }}">
                         <i class="fas fa-list nav-icon"></i>
                         <p>Cara Pesan</p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="{{ url('admin/abouts') }}"
                         class="nav-link {{ $currentUrl == url('admin/abouts') ? 'active' : '' }}">
                         <i class="fas fa-copy nav-icon"></i>
                         <p>About Page</p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="{{ url('admin/brands') }}"
                         class="nav-link {{ $currentUrl == url('admin/brands') ? 'active' : '' }}">
                         <i class="fas fa-copy nav-icon"></i>
                         <p>Landing Page</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('auth/logout') }}"
                         class="nav-link {{ $currentUrl == url('auth/logout') ? 'active' : '' }}">
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
