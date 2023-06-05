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
                            <h3>{{ $brand->brand_name }}</h3>
                            <h2>Kami adalah tim fotografi berpengalaman yang berkomitmen untuk mengabadikan momen-momen
                                berharga dalam hidup Anda.</h2>
                            <p>
                                {{ $brand->about }}
                            </p>
                            <div class="text-center text-lg-start">
                                <a href="#"
                                    class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                    <span>Read More</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="{{ asset('customer/img/about.jpg') }}" class="img-fluid" alt="">
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

        <!-- ======= Values Section ======= -->
        <section id="values" class="values">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Cara Pesan</h2>
                    <p>Pahami Cara Pesan Jasa</p>
                </header>

                <div class="row">

                    {{-- <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="box">
                            <img src="{{ asset('customer/img/values-1.png') }}" class="img-fluid" alt="">
                            <h3>Ad cupiditate sed est odio</h3>
                            <p>Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit. Et veritatis id.
                            </p>
                        </div>
                    </div> --}}

                    <div class="col-lg-12 mt-12 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                        <div class="box">
                            {{-- <img src="{{ asset('customer/img/values-2.png') }}" class="img-fluid" alt=""> --}}
                            <h3>Simak dan pahami cara pesan jasa fotografi</h3>
                            <p>{{ $contact->method_order }}
                            </p>
                        </div>
                    </div>

                    {{-- <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
                        <div class="box">
                            <img src="{{ asset('customer/img/values-3.png') }}" class="img-fluid" alt="">
                            <h3>Fugit cupiditate alias nobis.</h3>
                            <p>Quam rem vitae est autem molestias explicabo debitis sint. Vero aliquid quidem commodi.
                            </p>
                        </div>
                    </div> --}}

                </div>

            </div>

        </section>
        <!-- End Values Section -->

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
                                <div class="info-box">
                                    <i class="bi bi-whatsapp"></i>
                                    <h3>Whatsapp</h3>
                                    <p>{{ $contact->name_on_account }}<br>+{{ $contact->whatsapp }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-instagram"></i>
                                    <h3>Instagram</h3>
                                    <p>{{ $contact->instagram }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-facebook"></i>
                                    <h3>Facebook</h3>
                                    <p>{{ $contact->facebook }}</p>
                                </div>
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
