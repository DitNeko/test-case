<x-layouts>
    <x-sidebar></x-sidebar>


    <html>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <style>
            body {
                background-color: #f8f9fa;
                font-family: Arial, sans-serif;
                position: relative;
                overflow: hidden;
            }

            .container {
                margin-top: -15px;
                margin-left: 220px;
                position: relative;
            }

            .card {
                border: none;
                border-radius: 12px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
                background: #ffffff;
                transition: transform 0.2s;
                max-width: 50vw;
                margin: auto;
            }

            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
            }

            .card-header {
                background-color: #573d7d;
                color: white;
                border-radius: 12px 12px 0 0;
            }

            .form-label {
                font-weight: bold;
                color: #573d7d;
            }

            .star-rating {
                display: flex;
                justify-content: center;
                gap: 10px;
                margin-top: 10px;
            }

            .star-rating .fa-star {
                color: #ddd;
                font-size: 36px;
                cursor: pointer;
                transition: color 0.3s;
            }

            .star-rating .fa-star.selected,
            .star-rating .fa-star.hovered {
                color: #FFD700;
                /* Warna kuning */
            }

            .form-text {
                color: #573d7d;
            }

            .submit-btn {
                background-color: #573d7d;
                border: none;
                border-radius: 25px;
                padding: 10px 20px;
                font-size: 16px;
                color: white;
                transition: background-color 0.3s, transform 0.2s;
            }

            .submit-btn:hover {
                background-color: #452c63;
                transform: translateY(-2px);
            }
        </style>
    </head>

    <body>
        {{-- header --}}
        <header class="p-3 bg-white border-bottom" style="height: 10vh;">
            <div class="container-fluid">
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2">
                        <button class="border-0 bg-white" id="toggleBtn" aria-label="Toggle menu">
                            <i class="fi fi-rr-menu-burger"></i>
                        </button>
                        <!-- Logo and Title -->
                        <img src="images/1720752709883.png" alt="Chlorine Logo" width="50" height="40">
                        <span class="fs-5 fw-bold mb-0 link-body-emphasis text-decoration-none">TrustyBite</span>
                    </div>

                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            @if ($data->picture === null)
                                <img src="{{ asset('/storage/DefaultProfile/profile.png') }}" alt="Profile"
                                    width="40" height="40" class="rounded-circle">
                            @else
                                <img src="{{ asset('/storage/profile/' . $data->picture) }}" alt="Profile"
                                    width="40" height="40" class="rounded-circle">
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end text-small" style="min-width: 120px;">
                            <li><a class="dropdown-item" href="/profil">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/logout">Log out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        {{-- header end --}}
        <div class="container">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Survey Kepuasan Pengguna</h3>
                    <p class="mb-0">Kami menghargai masukan Anda untuk meningkatkan layanan kami</p>
                </div>
                <div class="card-body">
                    <form action="/surveyKepuasan" method="POST">
                        @csrf
                        <!-- Star Rating -->
                        <div class="mb-4">
                            <label class="form-label">1. Seberapa puas kamu menggunakan Layanan kami?</label>
                            <div class="star-rating">
                                <i class="fas fa-star" data-value="1"></i>
                                <i class="fas fa-star" data-value="2"></i>
                                <i class="fas fa-star" data-value="3"></i>
                                <i class="fas fa-star" data-value="4"></i>
                                <i class="fas fa-star" data-value="5"></i>
                            </div>
                            <div class="text-center mt-2">
                                <input type="hidden" name="rating" id="ratingInput" value="{{ old('rating', 0) }}">
                                
                            </div>
                        </div>

                        <!-- Additional Comments -->
                        <div class="mb-4">
                            <label for="experienceDetails" class="form-label">2. Berikan masukan kepada kami</label>
                            <textarea class="form-control" id="experienceDetails" name="comments" rows="3" placeholder="Ketikkan Review..."></textarea>
                        </div>

                        <!-- Date Input -->
                        <div class="mb-4">
                            <label for="experienceDate" class="form-label">3. Apakah kamu ingat kapan waktunya?</label>
                            <small class="form-text">Pilih perkiraan tanggal</small>
                            <input type="date" class="form-control" id="experienceDate" name="date">
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn submit-btn w-100 py-2">Kirim Review</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- JavaScript -->
        <script>
            // Function to handle star click event
            const stars = document.querySelectorAll('.star-rating .fa-star');
            const ratingValue = document.getElementById('ratingInput');

            stars.forEach(star => {
    star.addEventListener('click', () => {
        const value = star.getAttribute('data-value');
        ratingInput.value = value;  // Set nilai rating ke hidden input

        stars.forEach(s => s.classList.remove('selected'));
        star.classList.add('selected');

        // Menambahkan class 'selected' ke semua bintang sebelumnya
        for (let i = 0; i < value; i++) {
            stars[i].classList.add('selected');
        }
    });


                stars.forEach(star => {
                    star.addEventListener('click', () => {
                        const value = star.getAttribute('data-value');
                        ratingInput.value = value; // Set nilai rating ke hidden input

                        stars.forEach(s => s.classList.remove('selected'));
                        star.classList.add('selected');

                        // Menambahkan class 'selected' ke semua bintang sebelumnya
                        for (let i = 0; i < value; i++) {
                            stars[i].classList.add('selected');
                        }
                    });
                });

                // Hover effect
                star.addEventListener('mouseover', function() {
                    const hoverValue = this.getAttribute('data-value');

                    // Highlight stars up to the hovered one
                    for (let i = 0; i < hoverValue; i++) {
                        stars[i].classList.add('hovered');
                    }
                });

                // Remove hover effect
                star.addEventListener('mouseleave', function() {
                    // Remove hover effect from all stars
                    stars.forEach(s => s.classList.remove('hovered'));
                });
            });
        </script>
    </body>

    </html>
</x-layouts>
