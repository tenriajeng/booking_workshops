@extends('layouts._app')

@section('content')
    <!-- Inspiro Slider -->
    <div id="slider" class="inspiro-slider slider-fullscreen dots-creative" data-fade="true">
        <!-- Slide 1 -->
        <div class="slide kenburns"
            data-bg-image="{{ asset('asset/car-body-polishing-process-at-the-detailing-worksh-2022-01-28-00-02-04-utc.jpg') }}">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="slide-captions text-center text-light">
                    <!-- Captions -->
                    <h1>Selamat Datang di Car Workshop Booking</h1>
                    <p>
                        Selamat datang di Car Workshop Booking, tempat terbaik untuk merawat kendaraan Anda! Kami adalah
                        penyedia layanan workshop mobil yang profesional dan dapat diandalkan
                    </p>
                    <div><a href="#welcome" class="btn scroll-to">Explore more</a></div>
                    </span>
                    <!-- end: Captions -->
                </div>
            </div>
        </div>
        <!-- end: Slide 1 -->
    </div>
    <!--end: Inspiro Slider -->

    <!-- WHAT WE DO -->
    <section class="background-grey">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>Mengapa Memilih Kami?</h2>
                <span class="lead">
                    Kami mengerti betapa berharganya kendaraan Anda bagi Anda. Itulah mengapa kami menawarkan berbagai
                    alasan untuk Anda memilih Car Workshop Booking:
                </span>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div data-animate="fadeInUp" data-animate-delay="0">
                        <h4>Profesionalisme</h4>
                        <p>
                            Tim teknisi kami adalah para ahli dalam bidangnya. Mereka memiliki pengalaman yang luas dan
                            pengetahuan mendalam tentang berbagai merek dan model mobil.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div data-animate="fadeInUp" data-animate-delay="200">
                        <h4>Kenyamanan</h4>
                        <p>
                            Kami tahu bahwa waktu Anda berharga. Dengan sistem pemesanan online kami, Anda dapat dengan
                            mudah memesan perawatan kendaraan Anda tanpa harus menghabiskan waktu berlama-lama di bengkel.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div data-animate="fadeInUp" data-animate-delay="400">
                        <h4>Kualitas</h4>
                        <p>
                            Kami hanya menggunakan suku cadang berkualitas tinggi dan alat-alat terbaru untuk memastikan
                            kendaraan Anda mendapatkan perawatan terbaik.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div data-animate="fadeInUp" data-animate-delay="600">
                        <h4>Harga yang Bersaing</h4>
                        <p>
                            Kami menawarkan harga yang kompetitif untuk layanan kami. Kami percaya bahwa perawatan
                            berkualitas tidak harus mahal.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div data-animate="fadeInUp" data-animate-delay="800">
                        <h4>Kepuasan Pelanggan</h4>
                        <p>
                            Kepuasan pelanggan adalah prioritas kami yang utama. Kami bangga melayani pelanggan dengan penuh
                            dedikasi dan selalu siap mendengarkan masukan Anda.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- END WHAT WE DO -->

    <!-- SERVICES -->
    <section>
        <div class="container">
            <div class="heading-text heading-section text-center">
                <h2>Layanan Kami</h2>
                <p>
                    Kami menawarkan berbagai layanan perawatan dan perbaikan kendaraan, termasuk:
                </p>
            </div>
            <div class="row">
                <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="0">
                    <div class="icon-box effect medium border small">
                        <div class="icon">
                            <a href="#"><i class="fa fa-plug"></i></a>
                        </div>
                        <h3>Perawatan Berkala</h3>
                        <p>
                            Perawatan rutin seperti penggantian oli, perawatan mesin, dan lainnya.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="200">
                    <div class="icon-box effect medium border small">
                        <div class="icon">
                            <a href="#"><i class="fa fa-desktop"></i></a>
                        </div>
                        <h3>Perbaikan Umum</h3>
                        <p>
                            Perbaikan berbagai masalah mekanis dan elektrikal.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="400">
                    <div class="icon-box effect medium border small">
                        <div class="icon">
                            <a href="#"><i class="fa fa-cloud"></i></a>
                        </div>
                        <h3>Servis Ban</h3>
                        <p>
                            Pemasangan dan perawatan ban kendaraan Anda.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="600">
                    <div class="icon-box effect medium border small">
                        <div class="icon">
                            <a href="#"><i class="far fa-lightbulb"></i></a>
                        </div>
                        <h3>
                            Bodywork
                        </h3>
                        <p>
                            Perbaikan kerusakan bodi dan cat kendaraan.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="800">
                    <div class="icon-box effect medium border small">
                        <div class="icon">
                            <a href="#"><i class="fa fa-trophy"></i></a>
                        </div>
                        <h3>Pengecekan Kendaraan</h3>
                        <p>
                            Pemeriksaan kendaraan sebelum perjalanan jauh atau setelah kecelakaan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end: SERVICES -->
@endsection
