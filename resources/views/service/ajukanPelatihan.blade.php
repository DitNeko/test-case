<x-layouts>
    {{-- custom css --}}
    <style>
        body {
            background: #f5f6f7;
        }

        .wrap-body {
            margin: 0;
            width: 100%;
        }

        header {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background-color: #ffffff;
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
            margin-top: 60px;
            padding: 5px;
            padding-top: 20px;
            transition: margin-left 0.3s ease;
            margin-left: 250px;
        }

        .main-dashboard.shifted {
            margin-left: 0;
        }

        .card-box {
            width: 300px;
            height: 150px;
            background-color: violet;
        }

        .t-box {
            color: black;
        }

        .t-box:hover {
            color: #0d6efd;
        }

        .card-box {
            background-color: #ffffff;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        .text-sidebar {
            color: black;
        }

        .text-sidebar:hover {
            color: #0d6efd;
        }

        .fi-rr-menu-burger:hover {
            color: #0d6efd;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }
    </style>
    {{-- custom css end --}}
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
        <!-- isi -->
        <div class="main-dashboard" id="mainDashboard">
            <div class="container-fluid d-flex justify-content-center mt-4">
                <div class="row p-2 rounded-3"
                    style="width: 1225px; background-color: #ffffff; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                    <table class="table">
                        <form action="/ajukanPelatihan" method="POST" class="container mt-5"
                            enctype="multipart/form-data">
                            @csrf
                            <h2 class="mb-4">Pengajuan Pelatihan Gratis</h2>


                            <b class="mb-4">Syarat dan Ketentuan</b>
                            <div class="mb-4">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul" required>
                            </div>

                            <div class="mb-4">
                                <label for="subjudul" class="form-label">Sub Judul</label>
                                <input type="text" class="form-control" id="subjudul" name="sub" required>
                            </div>

                            <div class="mb-4">
                                <label for="pemateri" class="form-label">Pemateri</label>
                                <input type="text" class="form-control" id="pemateri" name="pemateri" required>
                            </div>
                            <div class="mb-4">
                                <label for="poto" class="form-label">Gambar</label>
                                <input type="file" class="form-control" id="poto" name="poto" required>
                            </div>

                            <div class="mb-4">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="" disabled selected>Pilih Mode Pelatihan</option>
                                    <option value="online">Online</option>
                                    <option value="offline">Offline</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <input type="hidden" class="form-control" id="price" name="price"
                                    value="Free" min="1">
                            </div>
                            <div class="mb-4">
                                <label for="quota" class="form-label">Kuota</label>
                                <input type="number" class="form-control" id="quota" name="quota"
                                    min="1" required>
                            </div>
                            <div class="mb-4">
                                <label for="cource" class="form-label">Materi</label>
                                <input type="text" class="form-control" id="cource" name="cource" required>
                            </div>
                            <div class="mb-4">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <div class="mb-4">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                            </div>
                            <div class="mb-4">
                                <label for="deskripsi" class="form-label">Link</label>
                                <input type="text" class="form-control" id="deskripsi" name="link"
                                    placeholder="Link Zoom atau Link Google Maps" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" name="submit" class="btn btn-primary">Kirim
                                    Pengajuan</button>
                            </div>
                        </form>

                    </table>

                </div>
            </div>
        </div>
    </div>

    {{-- js --}}
    <script>
        const sidebar = document.getElementById("collapsedSidebar");
        const toggleBtn = document.getElementById("toggleBtn");
        const mainDashboard = document.getElementById("mainDashboard");

        toggleBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            mainDashboard.classList.toggle("shifted");
        });

        // Inisialisasi toast jika ada pesan sukses
        document.addEventListener('DOMContentLoaded', function() {
            var successToastEl = document.getElementById('successToast');
            if (successToastEl) {
                var toast = new bootstrap.Toast(successToastEl);
                toast.show();

                // Set timeout untuk menghilangkan toast setelah 3 detik
                setTimeout(function() {
                    toast.hide();
                }, 5000);
            }
        });
    </script>
</x-layouts>
