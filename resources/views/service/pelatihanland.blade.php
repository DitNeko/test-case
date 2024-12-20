<x-layouts>

    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- CSS untuk Interaksi dan Animasi -->
    <style>
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: rgba(0, 0, 0, 0.15) 0px 15px 25px;
        }

        .btn-primary {
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn-primary:hover {
            transform: scale(1.05);
        }

        .card-img-top {
            transition: filter 0.3s, transform 0.3s;
        }

        .card-img-top:hover {
            filter: brightness(0.85);
            transform: scale(1.05);
        }

        .shifted {
            margin-left: 250px;
        }
    </style>

    <!-- Animate.css untuk Animasi -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    {{-- header --}}
    <header class="p-3" style="height: 10vh;">
        <div class="container-fluid">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <div class="gap-1 d-flex">
                    <button class="border-0" style="background-color: #ffffff;" id="toggleBtn"><i
                            class="fi fi-rr-menu-burger"></i></button>
                    <!-- Logo and Title -->
                    <img src="/images/1720752709883.png" alt="Chlorine Logo" width="50" height="40">
                    <span class="fs-5 fw-bold mb-0 link-body-emphasis text-decoration-none">TrustyBite</span>
                </div>

                <div class="dropdown text-end">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @if ($user->picture === null)
                            <img src="{{ asset('/storage/DefaultProfile/profile.png') }}" alt="mdo" width="40"
                                height="40" class="rounded-circle">
                        @else
                            <img src="{{ asset('/storage/profile/' . $user->picture) }}" alt="mdo" width="40"
                                height="40" class="rounded-circle">
                        @endif
                    </a>
                    <ul class="dropdown-menu text-small">
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
    <x-sidebar>
        <!-- Dashboard Utama -->
        <div class="container my-3 p-3 bg-body rounded shadow-sm">
            <div class="row g-3">
                <!-- Looping Data Pelatihan -->
                @foreach ($data as $trainingdata)
                    <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
                        <div class="card h-100 shadow-sm border-0 position-relative">
                            <!-- Gambar Pelatihan -->
                            <img src="{{ asset('/storage/Peltihan/' . $trainingdata->poto) }}"
                                class="card-img-top img-fluid" alt="{{ $trainingdata->title }}"
                                style="object-fit: cover; height: 180px;">

                            <!-- Badge Status -->
                            <span
                                class="badge bg-{{ $trainingdata->status === 'Open' ? 'success' : 'danger' }} position-absolute top-0 end-0 m-2">
                                {{ $trainingdata->status }}
                            </span>

                            <!-- Konten Kartu -->
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-semibold">{{ $trainingdata->title }}</h5>
                                <p class="card-text text-muted">{{ $trainingdata->sub }}</p>
                                <p class="mb-2">⭐ 4.9 (88 ulasan)</p>
                                <p class="card-text fw-bold mb-3">Rp Free</p>
                                <a href="{{ url('/layanan/pilihPelatihan/' . $trainingdata->id . '/edit') }}"
                                    class="btn btn-primary mt-auto">
                                    Ikut Pelatihan
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-sidebar>

    <!-- JavaScript untuk Sidebar Toggle -->
    <script>
        const sidebar = document.getElementById("collapsedSidebar");
        const toggleBtn = document.getElementById("toggleBtn");
        const mainDashboard = document.getElementById("mainDashboard");

        toggleBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            mainDashboard.classList.toggle("shifted");
        });
    </script>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</x-layouts>
