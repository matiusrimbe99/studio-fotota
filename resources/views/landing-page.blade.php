@extends('guest_templates/app')
@section('lp-title', $brand->brand_name)
@section('hero-section')
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
@endsection

@section('main')
    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">

            <div class="container" data-aos="fade-up">
                <div class="row gx-0">

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="content">
                            <h3>About Us</h3>
                            <h2>{{ $about->lead_about }}</h2>
                            <p>
                                {{ $about->about_us }}
                            </p>
                            <div class="text-center text-lg-start">
                                <a href="#contact"
                                    class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                    <span>Hubungi Kami</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="{{ $about->image }}" class="img-fluid" alt="">
                    </div>

                </div>
            </div>

        </section><!-- End About Section -->

        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Paket Foto</h2>
                    <p>Paket Foto Tersedia</p>
                </header>


                <div class="row gy-3" data-aos="fade-left">
                    @foreach ($packets as $packet)
                        <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                            <div class="box">
                                <h3 style="color: #07d5c0;">{{ $packet->packet_name }}</h3>
                                <div class="price">@currency($packet->price)<span></span></div>
                                <img src="{{ $packet->image }}" class="img-fluid" alt="">
                                <ul>
                                    <li>{{ $packet->description }}</li>
                                </ul>
                                <a href="{{ url('auth/login') }}" class="btn-buy">Pesan Sekarang</a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </section>
        <!-- End Pricing Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Galeri Foto</h2>
                    <p>Gambar yang Kami Potret</p>
                </header>

                {{-- <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-app">App</li>
                            <li data-filter=".filter-card">Card</li>
                            <li data-filter=".filter-web">Web</li>
                        </ul>
                    </div>
                </div> --}}

                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

                    @foreach ($galleries as $gallery)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="{{ $gallery->image }}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>{{ $gallery->description }}</h4>
                                    <p>Image</p>
                                    <div class="portfolio-links">
                                        <a href="{{ $gallery->image }}" data-gallery="portfolioGallery"
                                            class="portfokio-lightbox" title="{{ $gallery->description }}"><i
                                                class="bi bi-plus"></i></a>
                                        <a href="{{ $gallery->image }}" target="_blank" title="Lihat Foto"><i
                                                class="bi bi-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach



                </div>

            </div>

        </section><!-- End Portfolio Section -->

        <!-- ======= Recent Blog Posts Section ======= -->
        <section id="recent-blog-posts" class="recent-blog-posts">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Studio</h2>
                    <p>Paket Studio Tersedia</p>
                </header>

                <div class="row">

                    @foreach ($studios as $studio)
                        <div class="col-lg-4">
                            <div class="post-box">
                                <div class="post-img"><img src="{{ $studio->image }}" class="img-fluid" alt="">
                                </div>
                                <span class="post-date">{{ $studio->studio_name }}</span>
                                <h3 class="post-title">{{ $studio->description }}</h3>
                                <a href="{{ url('auth/login') }}"
                                    class="readmore stretched-link mt-auto "><span>@currency($studio->price)</span></a>
                            </div>
                        </div>
                    @endforeach



                </div>

            </div>

        </section>
        <!-- End Recent Blog Posts Section -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">

            <div class="container aos-init aos-animate" data-aos="fade-up">

                <header class="section-header">
                    <h2>Cara Pesan</h2>
                    <p>Berikut Cara Pesan Jasa Kami</p>
                </header>
                <!-- Feature Icons -->
                <div class="row mt-5 feature-icons aos-init aos-animate" data-aos="fade-up">
                    <div class="row">
                        <div class="col-xl-12 d-flex content">
                            <div class="row align-self-center gy-4">

                                <div class="col-md-6 icon-box aos-init aos-animate" data-aos="fade-up">
                                    <i class="ri-stack-line"></i>
                                    <div>
                                        <h4>Langkah 1</h4>
                                        <p>{{ $orderMethod->first }}</p>
                                    </div>
                                </div>

                                <div class="col-md-6 icon-box aos-init aos-animate" data-aos="fade-up"
                                    data-aos-delay="100">
                                    <i class="ri-stack-line"></i>
                                    <div>
                                        <h4>Langkah 2</h4>
                                        <p>{{ $orderMethod->second }}</p>
                                    </div>
                                </div>

                                <div class="col-md-6 icon-box aos-init aos-animate" data-aos="fade-up"
                                    data-aos-delay="200">
                                    <i class="ri-stack-line"></i>
                                    <div>
                                        <h4>Langkah 3</h4>
                                        <p>{{ $orderMethod->third }}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6 icon-box aos-init aos-animate" data-aos="fade-up"
                                    data-aos-delay="300">
                                    <i class="ri-stack-line"></i>
                                    <div>
                                        <h4>Langkah 4</h4>
                                        <p>{{ $orderMethod->fourth }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div><!-- End Feature Icons -->

            </div>

        </section>
        <!-- End Features Section -->



        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Contact</h2>
                    <p>Hubungi Kami</p>
                </header>

                <div class="row gy-4">

                    <div class="col-lg-6">

                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Alamat</h3>
                                    <p>{{ $brand->address }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <a href="https://api.whatsapp.com/send/?phone={{ $contact->whatsapp }}" target="_blank">
                                    <div class="info-box">
                                        <i class="bi bi-whatsapp"></i>
                                        <h3>Whatsapp</h3>
                                        <p>{{ $contact->name_on_account }}<br>+{{ $contact->whatsapp }}</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="https://www.instagram.com/{{ $contact->instagram }}" target="_blank">
                                    <div class="info-box">
                                        <i class="bi bi-instagram"></i>
                                        <h3>Instagram</h3>
                                        <p>{{ $contact->instagram }}</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="https://www.facebook.com/{{ $contact->facebook }}" target="_blank">
                                    <div class="info-box">
                                        <i class="bi bi-facebook"></i>
                                        <h3>Facebook</h3>
                                        <p>{{ $contact->facebook }}</p>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6">
                        <form action="forms/contact.php" method="post" class="php-email-form">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Nama Anda"
                                        required>
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" placeholder="Email Anda"
                                        required>
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Judul"
                                        required>
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Pesan" required></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit">Kirim Pesan</button>
                                </div>

                            </div>
                        </form>

                    </div>

                </div>

            </div>

        </section><!-- End Contact Section -->

    </main>
@endsection
