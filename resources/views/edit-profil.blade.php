<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $titleApp }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('customer/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('customer/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('customer/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('customer/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('customer/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('customer/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('customer/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('customer/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('customer/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: FlexStart
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center">
                <img src="{{ asset('customer/img/logo.png') }}" alt="">
                <span>{{ $brand->brand_name }}</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    @if (Auth::check() && Auth::user()->role_id == 2)
                        <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                        <li class="dropdown"><a href="#"><span>Profile</span> <i
                                    class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="{{ url('orders/create') }}">Order Jasa</a></li>
                                <li><a href="{{ url('orders/customers') }}">List Order</a></li>
                                <li><a href="{{ url('customers/profil') }}">Edit Profil</a></li>
                                <li><a href="{{ url('customers/change-password') }}">Ganti Password</a></li>
                            </ul>
                        </li>
                    @endif

                    @if (Auth::check() && Auth::user()->role_id == 2)
                        <li><a class="getstarted scrollto" href="{{ url('auth/logout') }}">Logout</a></li>
                    @else
                        <li><a class="getstarted scrollto" href="{{ url('auth/login') }}">Login</a></li>
                    @endif


                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header>

    <!-- End Header -->
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">{{ $brand->description }}</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Alamat Kami di {{ $brand->address }}</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="#about"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Tentang Kami</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ $brand->image }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section>
    <!-- End Hero -->

    <!-- ======= Main ======= -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2>Edit Profil</h2>
                <p>Silahkan Mengubah Form Dibawah Ini</p>
            </header>

            <div class="row gy-4">

                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <form action="{{ url('customers/profil') }}" method="POST" class="php-email-form">
                        @csrf
                        @method('PATCH')
                        <div class="row gy-4">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="col-md-6">
                                <label for="name">Nama Lengkap</label>
                                <input id="name" name="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Masukkan nama Anda" value="{{ $userData->customer->name }}">

                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="address">Alamat</label>
                                <input id="address" name="address" type="text"
                                    class="form-control @error('address') is-invalid @enderror"
                                    placeholder="Masukkan alamat" value="{{ $userData->customer->address }}">

                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="username">Username</label>
                                <input id="username" class="form-control" value="{{ $userData->username }}"
                                    readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input id="email" class="form-control" value="{{ $userData->email }}" readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="gender">Jenis Kelamin</label>
                                <select id="gender" name="gender"
                                    class="form-control @error('gender') is-invalid @enderror">
                                    <option value="">--- Pilih Jenis Kelamin ---</option>
                                    <option value="1">Laki-Laki</option>
                                    <option value="2">Perempuan</option>

                                </select>
                                @error('gender')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="nomor_hp">Nomor HP</label>
                                <input id="nomor_hp" name="nomor_hp" type="text"
                                    class="form-control @error('nomor_hp') is-invalid @enderror"
                                    placeholder="Masukkan nomor HP" value="{{ $userData->customer->nomor_hp }}">

                                @error('nomor_hp')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="col-md-12 text-center">
                                <button class="mt-5" type="submit">Ubah Profil</button>
                            </div>

                        </div>
                    </form>

                </div>
                <div class="col-lg-1"></div>

            </div>

        </div>

    </section><!-- End Contact Section -->
    <!-- End Main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>StudioFoto'ta</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                <br>Develop by <a href="/">Firmansyah Musmar</a>
            </div>
        </div>
    </footer>

    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('customer/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('customer/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('customer/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('customer/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('customer/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('customer/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('customer/js/main.js') }}"></script>

</body>

</html>
