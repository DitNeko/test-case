<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page Katering</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .fadeInUp {
            animation: fadeInUp 1s ease-in-out;
        }

        .fadeInUp.delay-1s {
            animation-delay: 1s;
        }

        .fadeInUp.delay-2s {
            animation-delay: 2s;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Media Queries untuk Responsivitas */
        @media (max-width: 768px) {
            .hero {
                height: 80vh;
                /* Mengurangi tinggi untuk layar kecil */
            }

            .hero h1 {
                font-size: 2.5rem;
                /* Mengurangi ukuran font judul untuk layar kecil */
            }

            .hero .lead {
                font-size: 1.2rem;
                /* Mengurangi ukuran font deskripsi */
            }
        }

        @media (max-width: 576px) {
            .hero {
                height: 70vh;
                /* Mengurangi tinggi lebih jauh untuk perangkat lebih kecil */
            }

            .hero h1 {
                font-size: 2rem;
                /* Ukuran font judul lebih kecil */
            }

            .hero .lead {
                font-size: 1rem;
                /* Ukuran font deskripsi lebih kecil */
            }

            .btn-lg {
                padding: 0.8rem 2rem;
                /* Menyesuaikan ukuran tombol pada layar kecil */
            }
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .icon {
            background-color: #f0f8ff;
            border-radius: 50%;
            padding: 20px;
            display: inline-block;
        }

        /* Animasi Fade In dan Slide Up */
        .animateFadeIn {
            animation: fadeInUp 1s ease-in-out;
        }

        .animateFadeIn.delay-1s {
            animation-delay: 1s;
        }

        .animateFadeIn.delay-2s {
            animation-delay: 2s;
        }

        .animateFadeIn.delay-3s {
            animation-delay: 3s;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsivitas untuk tampilan mobile */
        @media (max-width: 768px) {
            .card-body {
                padding: 1.5rem;
                /* Menyesuaikan padding di layar lebih kecil */
            }

            .card-title {
                font-size: 1.2rem;
                /* Mengurangi ukuran font judul */
            }

            .card-text {
                font-size: 1rem;
                /* Mengurangi ukuran font deskripsi */
            }
        }

        /* Untuk layar ponsel yang lebih kecil */
        @media (max-width: 576px) {
            .card-body {
                padding: 1rem;
                /* Menyesuaikan padding */
            }

            .card-title {
                font-size: 1rem;
                /* Mengurangi ukuran font judul */
            }

            .card-text {
                font-size: 0.9rem;
                /* Mengurangi ukuran font deskripsi */
            }

            .icon {
                padding: 15px;
                /* Mengurangi padding pada ikon untuk ponsel */
            }

            .fa-3x {
                font-size: 2.5rem;
                /* Mengurangi ukuran ikon untuk tampilan lebih kecil */
            }
        }

        /* Card Umum */
        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        /* Ikon Fitur */
        .feature-icon {
            background-color: #f0f8ff;
            border-radius: 50%;
            padding: 20px;
            display: inline-block;
        }

        /* Animasi Fade In dan Slide Up */
        .animateFadeIn {
            animation: fadeInUp 1s ease-in-out;
        }

        .animateFadeIn.delay-1s {
            animation-delay: 1s;
        }

        .animateFadeIn.delay-2s {
            animation-delay: 2s;
        }

        .animateFadeIn.delay-3s {
            animation-delay: 3s;
        }

        .animateFadeIn.delay-4s {
            animation-delay: 4s;
        }

        /* Keyframe untuk Fade In */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsivitas untuk tampilan mobile */
        @media (max-width: 768px) {
            .feature-card-body {
                padding: 1.5rem;
                /* Menyesuaikan padding di layar lebih kecil */
            }

            .feature-card-title {
                font-size: 1.2rem;
                /* Mengurangi ukuran font judul */
            }

            .feature-card-text {
                font-size: 1rem;
                /* Mengurangi ukuran font deskripsi */
            }
        }

        /* Untuk layar ponsel yang lebih kecil */
        @media (max-width: 576px) {
            .feature-card-body {
                padding: 1rem;
                /* Menyesuaikan padding */
            }

            .feature-card-title {
                font-size: 1rem;
                /* Mengurangi ukuran font judul */
            }

            .feature-card-text {
                font-size: 0.9rem;
                /* Mengurangi ukuran font deskripsi */
            }

            .feature-icon {
                padding: 15px;
                /* Mengurangi padding pada ikon untuk ponsel */
            }

            .fa-3x {
                font-size: 2.5rem;
                /* Mengurangi ukuran ikon untuk tampilan lebih kecil */
            }
        }

        /* Styling untuk FAQ Title */
        .faq-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
        }

        /* Card accordion hover effect */
        .accordion-button {
            background-color: #f8f9fa;
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
            border-radius: 0.5rem;
            padding: 1.2rem;
            transition: all 0.3s ease;
        }

        .accordion-button:hover {
            background-color: #e2e6ea;
        }

        .accordion-button:not(.collapsed) {
            background-color: #d1e7dd;
            color: #0d6efd;
        }

        /* Animasi Fade In untuk setiap item FAQ */
        .animateFadeIn {
            animation: fadeInUp 1s ease-in-out;
        }

        .animateFadeIn.delay-1s {
            animation-delay: 1s;
        }

        .animateFadeIn.delay-2s {
            animation-delay: 2s;
        }

        .animateFadeIn.delay-3s {
            animation-delay: 3s;
        }

        /* Keyframe untuk Fade In */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsivitas FAQ */
        @media (max-width: 768px) {
            .accordion-button {
                font-size: 1rem;
                padding: 1rem;
            }
        }

        .about-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            position: relative;
        }

        .about-title:after {
            content: '';
            position: absolute;
            width: 50px;
            height: 3px;
            background-color: #007bff;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }

        .about-subtitle {
            font-size: 1.2rem;
            color: #666;
            max-width: 800px;
            margin: 0 auto;
        }

        .about-card {
            background-color: #fff;
            border-radius: 8px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
            padding: 20px;
            height: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .about-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .about-card-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
            margin-top: 15px;
        }

        .about-card-description {
            font-size: 1rem;
            color: #666;
            margin-top: 10px;
        }

        .about-icon i {
            color: #007bff;
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .about-card {
                margin-bottom: 20px;
            }
        }

        /* Animasi FadeIn */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animateFadeIn {
            animation: fadeIn 1s ease-in-out;
        }

        .cta-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            position: relative;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .cta-title:after {
            content: '';
            position: absolute;
            width: 80px;
            height: 3px;
            background-color: #0d6efd;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }

        .cta-subtitle {
            font-size: 1.2rem;
            color: #6c757d;
            max-width: 800px;
            margin: 0 auto;
        }

        .cta-btn {
            font-size: 1.2rem;
            font-weight: 600;
            padding: 15px 30px;
            border-radius: 50px;
            text-transform: uppercase;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .cta-btn:hover {
            background-color: #0d6efd;
            color: #fff;
            transform: scale(1.05);
        }

        .cta-btn:active {
            transform: scale(1);
        }

        @media (max-width: 768px) {
            .cta-btn {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <!-- Hero Section -->
    <section id="hero" class="hero bg-primary text-white d-flex align-items-center"
        style="background-image: url('https://images.unsplash.com/photo-1560845137-1c409fc58595?q=80&w=1416&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-size: cover; background-position: center; height: 100vh; position: relative;">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0, 0, 0, 0.4);"></div>
        <div class="container text-center position-relative z-index-1">
            <img src="images/TrustyBite.png" alt="TrustyBite Logo" class="mb-4"
                style="max-width: 250px; width: 100%; height: auto;">
            <h1 class="display-3 mb-4 animated fadeInUp">Distribusikan Katering Anda dengan Mudah</h1>
            <p class="lead mb-4 animated fadeInUp delay-1s">TrustyBite membantu Anda mendistribusikan katering tepat
                waktu dan dengan cara yang efisien.</p>
            <a href="/login" class="btn btn-light btn-lg animated fadeInUp delay-2s">Login Sekarang</a>
        </div>
    </section>

    <!-- Keunggulan Platform -->
    <section id="advantages" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5 animateFadeIn">Keunggulan Platform Kami</h2>
            <div class="row text-center">
                <!-- Keunggulan 1 -->
                <div class="col-md-4 col-12 mb-4">
                    <div class="card shadow-lg border-0 rounded-lg h-100 hover-shadow animateFadeIn delay-1s">
                        <div class="card-body">
                            <div class="icon mb-4">
                                <img src="Icons/delivery.png" alt=""> <!-- Ikon Pengiriman -->
                            </div>
                            <h5 class="card-title">Pengiriman Tepat Waktu</h5>
                            <p class="card-text">Kami memastikan setiap pengiriman katering dilakukan tepat waktu,
                                sehingga acara Anda berjalan lancar.</p>
                        </div>
                    </div>
                </div>

                <!-- Keunggulan 2 -->
                <div class="col-md-4 col-12 mb-4">
                    <div class="card shadow-lg border-0 rounded-lg h-100 hover-shadow animateFadeIn delay-2s">
                        <div class="card-body">
                            <div class="icon mb-4">
                                <img src="Icons/cutlery.png" alt=""> <!-- Ikon Menu -->
                            </div>
                            <h5 class="card-title">Pilihan Menu Beragam</h5>
                            <p class="card-text">Kami menyediakan berbagai pilihan menu katering yang bisa disesuaikan
                                dengan jenis acara dan preferensi Anda.</p>
                        </div>
                    </div>
                </div>

                <!-- Keunggulan 3 -->
                <div class="col-md-4 col-12 mb-4">
                    <div class="card shadow-lg border-0 rounded-lg h-100 hover-shadow animateFadeIn delay-3s">
                        <div class="card-body">
                            <div class="icon mb-4">
                                <img src="Icons/operator.png" alt=""> <!-- Ikon Layanan Pelanggan -->
                            </div>
                            <h5 class="card-title">Layanan Pelanggan 24/7</h5>
                            <p class="card-text">Tim kami siap membantu kapan saja untuk memastikan pengalaman Anda
                                dengan TrustyBite berjalan lancar.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fitur & Layanan -->
    <section id="features" class="features-section py-5">
        <div class="container">
            <h2 class="text-center mb-5 features-title animateFadeIn">Fitur & Layanan Kami</h2>
            <div class="row justify-content-center">
                <!-- Fitur 1: Pengajuan Sertifikat Halal -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                    <div
                        class="card feature-card shadow-lg border-0 rounded-lg h-100 hover-shadow animateFadeIn delay-1s">
                        <div class="card-body text-center">
                            <div class="feature-icon mb-4">
                                <img src="Icons/tag.png" alt=""> <!-- Ikon Sertifikat -->
                            </div>
                            <h5 class="card-title feature-card-title">Pengajuan Sertifikat Halal</h5>
                            <p class="card-text feature-card-text">Kami memfasilitasi pengajuan sertifikat halal bagi
                                pengusaha kuliner untuk memastikan produk Anda memenuhi standar halal yang diakui.</p>
                        </div>
                    </div>
                </div>

                <!-- Fitur 2: Dokumen NIB -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                    <div
                        class="card feature-card shadow-lg border-0 rounded-lg h-100 hover-shadow animateFadeIn delay-2s">
                        <div class="card-body text-center">
                            <div class="feature-icon mb-4">
                                <img src="Icons/stamp.png" alt=""> <!-- Ikon Dokumen -->
                            </div>
                            <h5 class="card-title feature-card-title">Dokumen NIB</h5>
                            <p class="card-text feature-card-text">Kami membantu pengusaha kuliner dalam pengurusan
                                dokumen NIB (Nomor Induk Berusaha) untuk legalitas usaha Anda.</p>
                        </div>
                    </div>
                </div>

                <!-- Fitur 3: Pelatihan Gratis -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                    <div
                        class="card feature-card shadow-lg border-0 rounded-lg h-100 hover-shadow animateFadeIn delay-3s">
                        <div class="card-body text-center">
                            <div class="feature-icon mb-4">
                                <img src="Icons/vocational.png" alt=""> <!-- Ikon Pelatihan -->
                            </div>
                            <h5 class="card-title feature-card-title">Pelatihan Gratis</h5>
                            <p class="card-text feature-card-text">Kami menawarkan pelatihan gratis untuk pengusaha
                                kuliner yang ingin meningkatkan keterampilan dan pengetahuan dalam dunia usaha makanan.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Fitur 4: Kebutuhan Makanan Bergizi Gratis -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                    <div
                        class="card feature-card shadow-lg border-0 rounded-lg h-100 hover-shadow animateFadeIn delay-4s">
                        <div class="card-body text-center">
                            <div class="feature-icon mb-4">
                                <img src="Icons/salad.png" alt=""> <!-- Ikon Makanan Sehat -->
                            </div>
                            <h5 class="card-title feature-card-title">Kebutuhan Makanan Bergizi Gratis</h5>
                            <p class="card-text feature-card-text">Kami menyediakan kebutuhan makanan bergizi secara
                                gratis untuk membantu pengusaha kuliner memulai usaha yang sehat dan bermanfaat bagi
                                masyarakat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>

         <!-- FAQ Section -->
        <section id="faq" class="faq-section py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-5 faq-title animateFadeIn">Pertanyaan yang Sering Diajukan (FAQ)</h2>
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10 col-12">
                        <!-- Accordion FAQ -->
                        <div class="accordion" id="faqAccordion">
                            <!-- FAQ Item 1 -->
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        Apa saja layanan yang disediakan oleh platform ini?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Kami menyediakan berbagai layanan seperti pengajuan sertifikat halal, dokumen
                                        NIB, pelatihan gratis, dan kebutuhan makan bergizi untuk pengusaha kuliner.
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ Item 2 -->
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        Bagaimana cara mengajukan sertifikat halal?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Anda dapat mengajukan sertifikat halal melalui platform kami dengan mengisi
                                        formulir yang telah disediakan dan memenuhi persyaratan yang berlaku.
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ Item 3 -->
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        Apa syarat untuk mendapatkan pelatihan gratis?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Pelatihan gratis kami diberikan untuk pengusaha kuliner yang ingin mengembangkan
                                        keterampilan dalam manajemen usaha makanan. Daftar untuk mengikuti pelatihan di
                                        platform kami.
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ Item 4 -->
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                        aria-expanded="false" aria-controls="collapseFour">
                                        Apakah layanan ini tersedia untuk semua pengusaha kuliner?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse"
                                    aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Ya, layanan kami terbuka untuk semua pengusaha kuliner yang ingin mengembangkan
                                        usaha mereka dengan dukungan legalitas, pelatihan, dan fasilitas lainnya.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Tentang Kami Section -->
        <section id="about-us" class="about-us-section py-5">
            <div class="container text-center">
                <h2 class="about-title animateFadeIn mb-4">Tentang Kami</h2>
                <p class="about-subtitle mb-5">
                    Kami adalah platform yang berkomitmen untuk mendukung perkembangan usaha kuliner dengan menyediakan
                    berbagai layanan yang akan membantu bisnis Anda tumbuh lebih cepat dan sukses.
                </p>

                <!-- About Content -->
                <div class="row justify-content-center">
                    <!-- Visi -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="about-card shadow rounded p-4 animate__animated animate__fadeInUp">
                            <div class="about-icon mb-3">
                                <i class="bi bi-eye fs-3"></i> <!-- Ikon Visi -->
                            </div>
                            <h5 class="about-card-title">Visi Kami</h5>
                            <p class="about-card-description">
                                Menjadi platform yang menghubungkan usaha kuliner dengan peluang baru untuk berkembang
                                melalui kemudahan dalam pengurusan dokumen, pelatihan, dan akses ke berbagai sumber daya
                                yang dibutuhkan.
                            </p>
                        </div>
                    </div>

                    <!-- Misi -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="about-card shadow rounded p-4 animate__animated animate__fadeInUp">
                            <div class="about-icon mb-3">
                                <i class="bi bi-bullseye fs-3"></i> <!-- Ikon Misi -->
                            </div>
                            <h5 class="about-card-title">Misi Kami</h5>
                            <p class="about-card-description">
                                Meningkatkan kualitas dan keberlanjutan usaha kuliner melalui layanan pengurusan
                                sertifikat halal, NIB, pelatihan, dan dukungan lainnya yang dapat membantu usaha kuliner
                                sukses dan berkembang lebih cepat.
                            </p>
                        </div>
                    </div>

                    <!-- Keunggulan Platform -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="about-card shadow rounded p-4 animate__animated animate__fadeInUp">
                            <div class="about-icon mb-3">
                                <i class="bi bi-star fs-3"></i> <!-- Ikon Keunggulan -->
                            </div>
                            <h5 class="about-card-title">Keunggulan Kami</h5>
                            <p class="about-card-description">
                                Kami memberikan layanan lengkap dan terpercaya, dengan keunggulan dalam hal kemudahan
                                akses layanan, kecepatan proses, dan dukungan penuh untuk setiap langkah perjalanan
                                usaha kuliner Anda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call-to-Action Section -->
        <section id="cta" class="cta-section py-5">
            <div class="container text-center">
                <h2 class="cta-title text-dark mb-4 animate__animated animate__fadeInUp">Bergabunglah dengan Kami
                    Sekarang!</h2>
                <p class="cta-subtitle text-muted mb-5">
                    Dapatkan berbagai keuntungan untuk pengusaha kuliner, mulai dari sertifikasi hingga pelatihan
                    gratis. Daftar sekarang dan bawa usaha Anda ke level berikutnya!
                </p>

                <!-- Button Row -->
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <a href="/login"
                            class="cta-btn btn btn-lg btn-outline-primary w-100 mb-3 animate__animated animate__fadeInUp">
                            Login
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="/register"
                            class="cta-btn btn btn-lg btn-primary w-100 mb-3 animate__animated animate__fadeInUp">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer Section -->
        <footer class="bg-dark text-white py-5">
            <div class="container">
                <div class="row">
                    <!-- Kolom 1: Informasi Kontak -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h5 class="footer-title mb-3">Informasi Kontak</h5>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-phone-alt"></i> <a href="tel:+622123456789"
                                    class="text-white text-decoration-none">+62 21 2345 6789</a></li>
                            <li><i class="fas fa-envelope"></i> <a href="mailto:support@katering.com"
                                    class="text-white text-decoration-none">support@katering.com</a></li>
                            <li><i class="fas fa-map-marker-alt"></i> Jl. Raya No.123, Jakarta</li>
                            <li><i class="fas fa-clock"></i> Senin - Jumat, 09:00 - 18:00</li>
                        </ul>
                    </div>

                    <!-- Kolom 2: Tautan Cepat -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h5 class="footer-title mb-3">Tautan Cepat</h5>
                        <ul class="list-unstyled">
                            <li><a href="#about" class="text-white text-decoration-none">Tentang Kami</a></li>
                            <li><a href="#services" class="text-white text-decoration-none">Layanan</a></li>
                            <li><a href="#faq" class="text-white text-decoration-none">FAQ</a></li>
                            <li><a href="#contact" class="text-white text-decoration-none">Hubungi Kami</a></li>
                            <li><a href="#testimonials" class="text-white text-decoration-none">Testimoni</a></li>
                            <li><a href="#blog" class="text-white text-decoration-none">Blog</a></li>
                        </ul>
                    </div>

                    <!-- Kolom 3: Ikon Sosial Media -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h5 class="footer-title mb-3">Ikuti Kami</h5>
                        <ul class="list-unstyled d-flex">
                            <li class="me-3">
                                <a href="https://facebook.com" class="text-white" target="_blank">
                                    <i class="fab fa-facebook fa-2x"></i>
                                </a>
                            </li>
                            <li class="me-3">
                                <a href="https://twitter.com" class="text-white" target="_blank">
                                    <i class="fab fa-twitter fa-2x"></i>
                                </a>
                            </li>
                            <li class="me-3">
                                <a href="https://instagram.com" class="text-white" target="_blank">
                                    <i class="fab fa-instagram fa-2x"></i>
                                </a>
                            </li>
                            <li class="me-3">
                                <a href="https://linkedin.com" class="text-white" target="_blank">
                                    <i class="fab fa-linkedin fa-2x"></i>
                                </a>
                            </li>
                            <li class="me-3">
                                <a href="https://youtube.com" class="text-white" target="_blank">
                                    <i class="fab fa-youtube fa-2x"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Kolom 4: Langganan Newsletter -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h5 class="footer-title mb-3">Langganan Newsletter</h5>
                        <p>Berlangganan untuk mendapatkan informasi terkini dan penawaran eksklusif.</p>
                        <form action="#" method="post">
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Masukkan email Anda"
                                    required>
                                <button class="btn btn-primary" type="submit">Berlangganan</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Footer Bottom -->
                <div class="text-center mt-5">
                    <p class="mb-0">&copy; 2024 Katering Platform. Semua Hak Dilindungi.</p>
                    <ul class="list-unstyled d-flex justify-content-center">
                        <li class="me-3"><a href="#privacy" class="text-white text-decoration-none">Kebijakan
                                Privasi</a></li>
                        <li class="me-3"><a href="#terms" class="text-white text-decoration-none">Syarat &
                                Ketentuan</a></li>
                        <li><a href="#cookie" class="text-white text-decoration-none">Kebijakan Cookie</a></li>
                    </ul>
                </div>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
