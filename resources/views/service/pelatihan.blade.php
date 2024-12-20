<x-layouts>

    <!-- Gaya CSS -->
    <style>
        .main-dashboard {
            transition: margin-left 0.3s ease;
        }

        .shifted {
            margin-left: 250px;
        }

        .hero {
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background-color: #0d6efd;
            transition: background-color 0.3s ease, transform 0.2s;
        }

        .btn-primary:hover {
            background-color: #0a58ca;
            transform: scale(1.05);
        }

        .btn-outline-light:hover {
            background-color: white;
            color: black;
            border-color: white;
        }

        .list-group-item {
            border: none;
            padding: 0.75rem 1rem;
        }

        .card {
            transition: transform 0.2s, box-shadow 0.3s;
        }

        .card:hover {
            transform: scale(1.02);
            box-shadow: rgba(0, 0, 0, 0.2) 0px 10px 20px;
        }

        /* Custom Animasi */
        .animate__pulse {
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
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
        <div class="container my-3 p-3 bg-body rounded shadow-sm">
            <!-- Hero Section dengan Background dan Overlay -->
            <div class="hero position-relative vh-50 d-flex align-items-center p-5 rounded-4 overflow-hidden">
                <!-- Blurred Background Image -->
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-cover bg-center rounded-4"
                    style="background-image: url('{{ asset('/storage/Peltihan/' . $details->poto) }}'); 
                                        filter: blur(10px);">
                </div>

                <!-- Gradient Overlay -->
                <div class="position-absolute top-0 start-0 w-100 h-100"
                    style="background: linear-gradient(to bottom right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.8));">
                </div>

                <!-- Konten di Atas Overlay -->
                <div class="position-relative text-white animate__animated animate__fadeInDown">
                    <h1 class="display-3 fw-bold">{{ $details->title }}</h1>
                    <p class="lead mb-4">
                    @if ($quotacek==$details->quota)
                        Sudah memenuhi Kuota : {{$quotacek}}/{{ $details->quota }} orang |
                            @else 
                            Kuota : {{$quotacek}}/{{ $details->quota }} orang |
                        @endif
                         Narasumber: {{ $details->pemateri }}<br>
                        Materi : {{ $details->cource }} | Periode: {{ $details->date }}
                        
                    </p>
                    <div class="d-flex gap-3">


                        <form action="/layanan/pilihPelatihan/" method="post">
                            @csrf

                            <input type="hidden" class="form-control" id="" name="link"
                                value="{{ $details->zoom }}">
                            <input type="hidden" class="form-control" id="" name="foto"
                                value="{{ $details->poto }}">
                            <input type="hidden" class="form-control" id="" name="title"
                                value="{{ $details->title }}">
                            <input type="hidden" class="form-control" id="" name="id"
                                value="{{ $details->id }}">
                            @php
                                $user = Auth::user();
                                $alreadyRegistered = $user
                                    ->checkingtraining()
                                    ->where('pelatihan_id', $details->id)
                                    ->exists();

                            @endphp

                            @if ($quotacek==$details->quota)
                            <div class="d-inline">
                                    <p class=" d-inline alert alert-danger me-2 ">Quota sudah Terpenuhi.
                                    </p>
                                    <a href="/layanan/pilihPelatihan"
                                        class=" btn btn-outline-light shadow-lg btn-lg">Kembali</a>
                                </div>
                            @else
                            @if ($alreadyRegistered)
                                <div class="d-inline">
                                    <p class=" d-inline alert alert-danger me-2 ">Anda sudah terdaftar di pelatihan ini.
                                    </p>
                                    <a href="/layanan/pilihPelatihan"
                                        class=" btn btn-outline-light shadow-lg btn-lg">Kembali</a>
                                </div>
                            @else
                                <div class="d-inline">
                                    <button
                                        class="  me-2 btn btn-lg btn-primary shadow-lg animate__animated animate__pulse">Daftar
                                        Kelas Sekarang</button>
                                    <a href="/layanan/pilihPelatihan"
                                        class="btn btn-outline-light shadow-lg btn-lg">Kembali</a>
                                </div>
                            @endif
                            @endif

                            

                        </form>

                    </div>
                </div>
            </div>

            <!-- Konten Informasi -->
            <div class="row mt-5 g-4">
                <!-- Tentang Kelas -->
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title fw-semibold">Tentang Kelas</h4>
                            <p class="card-text text-muted">
                                Kapasitas: {{ $details->quota }} | Narasumber: {{ $details->pemateri }} <br>
                                Status: {{ $details->status }} | Periode: {{ $details->date }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Persyaratan Kelas -->
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title fw-semibold">Persyaratan</h4>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Berusia 18-35 tahun</li>
                                <li class="list-group-item">Warna Negara Indonesia</li>
                                <li class="list-group-item">Serius dan Fokus dalam mengikuti Pelatihan</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Materi Pelatihan -->
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title fw-semibold">Materi Pelatihan</h4>
                            Materi pelatihan: {{ $details->cource }}
                        </div>
                    </div>
                </div>
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


</x-layouts>
