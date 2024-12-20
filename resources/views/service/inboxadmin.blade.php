<x-layouts>
    <style>
        body {
            background: #f8f9fa;
        }

        .wrap-body {
            width: 100%;
            margin: 0;
        }

        header {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1050;
            background-color: #fff;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        .aside {
            width: 250px;
            background-color: #563d7c;
            color: white;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            transition: transform 0.3s ease;
        }

        .aside ul {
            padding: 0;
        }

        .aside a {
            color: rgba(255, 255, 255, 0.8);
            transition: color 0.2s;
        }

        .aside a:hover {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.1);
            padding: 10px;
            border-radius: 5px;
            transition: 0.7s;
        }

        .sidebar-collapsed .aside {
            transform: translateX(-250px);
        }

        .sidebar-collapsed .main-content {
            margin-left: 0;
        }

        .toggle-btn {
            border: none;
            background: none;
            color: #563d7c;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .list-unstyled li {
            margin: 10px 0;
        }

        .text-sidebar i {
            margin-right: 10px;
        }

        .main-dashboard {
            margin-left: 23vw;
            margin-top: 12vh;
            transition: margin-left 0.3s ease;
            padding: 2rem;
            max-width: 1000px;
            /* Limit the width */
        }

        .main-dashboard.shifted {
            margin-left: 0;
        }

        .update-item:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        /* Adjust layout for small screens */
        @media (max-width: 768px) {
            .aside {
                width: 100%;
                left: -100%;
            }

            .aside.open {
                left: 0;
            }

            .main-dashboard {
                margin-left: 0;
                padding: 1rem;
                /* Less padding for small screens */
            }
        }
    </style>

    <div class="wrap-body">
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
                            <img src="{{ asset('/storage/DefaultProfile/operatorAdmin.png') }}" alt="mdo" width="32" height="32"
                                class="rounded-circle">
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



        {{-- sidebar --}}
        <div class="aside" id="collapsedSidebar">
            <div class="p-3">
                <a href="/admin/dashboard" class="text-decoration-none ">
                    <h4 class="text-white mb-4 mt-3">Main Menu</h4>
                </a>
                <ul class="list-unstyled">
                    <li>
                        <a href="/admin/dashboard"
                            class="text-sidebar text-decoration-none ms-2 d-flex align-items-center">
                            <i class="fi fi-rr-home"></i> Beranda
                        </a>
                    </li>
                    <li>
                        <a href="/InboxAdmin" class="text-sidebar text-decoration-none ms-2 d-flex align-items-center">
                            <i class="fi fi-rr-inbox-in"></i> Inbox
                        </a>
                    </li>
                    <li>
                        <a href="/ajukanPelatihan/create"
                            class="text-sidebar text-decoration-none ms-2 d-flex align-items-center">
                            <i class="fi fi-rr-settings"></i> Jadwal Pelatihan Gratis
                        </a>
                    </li>
                    <li>
                        <a href="/ajukanPelatihan"
                            class="text-sidebar text-decoration-none ms-2 d-flex align-items-center">
                            <i class="fi fi-rr-envelope-download"></i> Tabel Pelatihan
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end sidebar -->

        <!-- Main Content -->
        <div class="container main-dashboard bg-white rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-4">Makan Siang</h6>
            <div class="row g-3">
                @foreach ($notifFood as $inbox)
                    <div class="col-md-6 col-lg-4">
                        <div class="card update-item border-0 shadow-sm">
                            <div class="card-body">
                                <strong>{{ $inbox->company }}</strong>
                                <p class="text-muted small">Makan Siang masih dalam status Pending</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <h6 class="border-bottom pb-2 mb-4">Survey Kepuasan</h6>
            <div class="row g-3">
                @foreach ($notifRate as $inbox)
                    <div class="col-md-6 col-lg-4">
                        <div class="card update-item border-0 shadow-sm">
                            <div class="card-body">
                                <strong>{{ $inbox->user->company_name }}</strong>
                                <p class="text-muted small">Ulasan : {{ $inbox->comments }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <h6 class="border-bottom pb-2 mt-5 mb-4">Sertifikat Halal</h6>
            <div class="row g-3">
                @foreach ($notifCerti as $inbox)
                    <div class="col-md-6 col-lg-4">
                        <div class="card update-item border-0 shadow-sm">

                            <div class="card-body">
                                <strong>{{ $inbox->company_name }}</strong>
                                <p class="text-muted small">Pengajuan Sertifikat masih dalam status Pending</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <h6 class="border-bottom pb-2 mt-5 mb-4">Nib</h6>
            <div class="row g-3">
                @foreach ($notifNib as $inbox)
                    <div class="col-md-6 col-lg-4">
                        <div class="card update-item border-0 shadow-sm">
                            <div class="me-3">
                                @if ($inbox->foto === null)
                                    <img src="{{ asset('/storage/DefaultProfile/profile.png') }}" alt="mdo"
                                        width="40" height="40" class="rounded-circle">
                                @else
                                    <img src="{{ asset('/storage/profile/' . $inbox->foto) }}" alt="mdo"
                                        width="50" height="50" class="rounded-circle">
                                @endif
                            </div>

                            <div class="card-body">
                                <strong>{{ $inbox->name }}</strong>
                                <p class="text-muted small">Pengajuan Nib masih dalam status Pending</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-end mt-3">
                <a href="#" class="btn btn-outline-primary btn-sm">View All Updates</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById('collapsedSidebar');
        const toggleBtn = document.getElementById('toggleBtn');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('open');
            document.querySelector('.main-dashboard').classList.toggle('shifted');
        });
    </script>
</x-layouts>
