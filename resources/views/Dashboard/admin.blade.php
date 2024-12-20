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

        /* Sidebar styles */
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

        /* Styling khusus untuk box */
        .stats-box {
            background: linear-gradient(135deg, #ffffff, #f7f7f7);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
            max-width: 200px;
            margin: 0 auto;
            overflow: hidden;
            color: black;
        }

        /* Efek hover dengan elevasi dan warna gradien */
        .stats-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
            background: linear-gradient(135deg, #007bff, #6c757d);
            color: #fff;
        }

        /* Styling untuk ikon background */
        .icon-background {
            font-size: 2rem;
            color: rgba(0, 123, 255, 0.1);
            position: absolute;
            top: 48px;
            right: 35px;
            transition: color 0.3s ease;
        }

        .stats-box:hover .icon-background {
            color: rgba(255, 255, 255, 0.1);
        }

        /* Kontainer teks utama */
        .stats-content {
            z-index: 1;
            position: relative;
        }

        /* Styling teks */
        .h5-box {
            font-size: 1rem;
            font-weight: 500;
            margin: 10px 0 5px;
        }

        .h3-box {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
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

        <div class="main-dashboard" id="mainDashboard">
            @if (session('success'))
                <div class="toast-container position-fixed top-0 end-0 p-3">
                    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="successToast">
                        <div class="toast-header bg-success">
                            <img src="Icons/notification-bell.png" class="rounded me-2" alt="...">
                            <strong class="me-auto">Notifikasi</strong>
                            <!-- Menampilkan waktu toast muncul -->
                            <small>{{ now()->format('H:i:s') }}</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            {{ session('success') }}
                        </div>
                    </div>
                </div>
            @endif

            @if (session('failed'))
                <div class="toast-container position-fixed top-0 end-0 p-3">
                    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="successToast">
                        <div class="toast-header bg-danger">
                            <img src="..." class="rounded me-2" alt="...">
                            <strong class="me-auto">Notifikasi</strong>
                            <!-- Menampilkan waktu toast muncul -->
                            <small>{{ now()->format('H:i:s') }}</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            {{ session('failed') }}
                        </div>
                    </div>
                </div>
            @endif

            <!-- Statistik Box -->
            <div class="container mt-4">
                <div class="row d-flex justify-content-center">
                    <!-- Total User Box -->
                    <div class="col-md-3 mb-3">
                        <div class="stats-box text-center p-4 border rounded shadow-sm" style="min-height: 130px;">
                            <div class="icon-background"><i class="bi bi-people-fill"></i></div>
                            <div class="stats-content">
                                <h5 class="h5-box">Total Users</h5>
                                <h3 class="h3-box fw-bold">{{ $users }}</h3>
                            </div>
                        </div>
                    </div>
                    <!-- Approved User Box -->
                    <div class="col-md-3 mb-3">
                        <a href="/export-nib" class="text-decoration-none text-light">
                            <div class="stats-box text-center p-4 border rounded shadow-sm" style="min-height: 130px;">
                                <div class="icon-background text-approved"><i class="fi fi-rr-envelope-download"></i></div>
                                <div class="stats-content">
                                    <h5 class="h5-box">Unduh Data NIB</h5>
                                    <h3 class="h3-box fw-bold">{{ $usersNib }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Rejected User Box with Adjusted Position -->
                    <div class="col-md-3 mb-3 d-flex align-items-end">
                        <a href="/export-users" class="text-decoration-none w-100">
                            <div class="stats-box text-center p-4 border rounded shadow-sm"
                                style="min-height: 130px;">
                                <div class="icon-background text-rejected"><i class="fi fi-rr-envelope-download"></i>
                                </div>
                                <div class="stats-content">
                                    <h5 class="h5-box">Unduh Data User</h5>
                                    <h3 class="h3-box fw-bold">{{ $users }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Pending User Box -->
                    <div class="col-md-3 mb-3">
                        <a href="/export-report" class="text-decoration-none w-100">
                            <div class="stats-box text-center p-4 border rounded shadow-sm"
                                style="min-height: 130px;">
                                <div class="icon-background text-pending"><i class="fi fi-rr-envelope-download"></i>
                                </div>
                                <div class="stats-content">
                                    <h5 class="h5-box">Unduh Data Sertifikat Halal</h5>
                                    <h3 class="h3-box fw-bold">{{ $usersCerti }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- end box -->

            <div class="container-fluid d-flex justify-content-center mt-4">
                <div class="row p-2 rounded-3"
                    style="width: 1225px; background-color: #ffffff; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                    <h3 class="mb-3">Aktivitas</h3>
                    <!-- Tab Navigation -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="page1-tab" data-bs-toggle="tab"
                                data-bs-target="#page1" type="button" role="tab" aria-controls="page1"
                                aria-selected="true">Sertifikat
                                Halal</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="page2-tab" data-bs-toggle="tab" data-bs-target="#page2"
                                type="button" role="tab" aria-controls="page2" aria-selected="false">Dokumen
                                NIB</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="page3-tab" data-bs-toggle="tab" data-bs-target="#page3"
                                type="button" role="tab" aria-controls="page3" aria-selected="false">Makan
                                Siang Gratis</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="page4-tab" data-bs-toggle="tab" data-bs-target="#page4"
                                type="button" role="tab" aria-controls="page4" aria-selected="false">Pelatihan
                                Gratis</button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content" id="myTabContent">
                        <!-- Page 1 -->
                        <div class="tab-pane fade show active" id="page1" role="tabpanel"
                            aria-labelledby="page1-tab">
                            <div class="table-responsive">
                                <table class="table table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Company</th>
                                            <th>Request</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @foreach ($certificates as $certificate)
                                            <tr>
                                                <td>
                                                    <div class="user-info">
                                                        @if ($certificate->foto === null)
                                                            <img src="{{ asset('/storage/DefaultProfile/profile.png') }}"
                                                                alt="mdo" width="40" height="40"
                                                                class="rounded-circle">
                                                        @else
                                                            <img src="{{ asset('/storage/profile/' . $certificate->user->picture) }}"
                                                                alt="Avatar">
                                                        @endif
                                                        <span>{{ $certificate->user->name }}</span>
                                                    </div>
                                                </td>
                                                <td>{{ $certificate['company_name'] }}</td>
                                                <td>{{ $certificate['created_at'] }}</td>
                                                <td>
                                                    @if ($certificate->status === 'pending')
                                                        <span class="badge text-bg-warning">Pending</span>
                                                    @elseif ($certificate->status === 'approved')
                                                        <span class="badge text-bg-success">Approved</span>
                                                    @elseif ($certificate->status === 'rejected')
                                                        <span class="badge text-bg-danger">Rejected</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($certificate->status === 'pending')
                                                        <!-- Tombol Approve -->
                                                        <form
                                                            action="{{ route('pengajuan.approve', $certificate->id) }}"
                                                            method="POST" style="display:inline-block;">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-success">Approve</button>
                                                        </form>

                                                        <!-- Tombol Reject -->
                                                        <form
                                                            action="{{ route('pengajuan.reject', $certificate->id) }}"
                                                            method="POST" style="display:inline-block;">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-danger">Reject</button>
                                                        </form>
                                                    @endif
                                                    @if ($certificate->status == 'rejected')
                                                        <form action="{{ url('/DeleteCerti/' . $certificate->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Page 2 -->
                        <div class="tab-pane fade" id="page2" role="tabpanel" aria-labelledby="page2-tab">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Business</th>
                                        <th>Request</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nibs as $nib)
                                        <tr>
                                            <td>
                                                <div class="user-info">
                                                    @if ($nib->foto === null)
                                                        <img src="{{ asset('/storage/DefaultProfile/profile.png') }}"
                                                            alt="mdo" width="40" height="40"
                                                            class="rounded-circle">
                                                    @else
                                                        <img src="{{ asset('/storage/profile/' . $nib->user->picture) }}"
                                                            alt="Avatar">
                                                    @endif
                                                    <span>{{ $nib->user->name }}</span>
                                                </div>
                                            </td>
                                            <td>{{ $nib['business_name'] }}</td>
                                            <td>{{ $nib['created_at'] }}</td>
                                            <td>
                                                @if ($nib->status === 'pending')
                                                    <span class="badge text-bg-warning">Pending</span>
                                                @elseif ($nib->status === 'approved')
                                                    <span class="badge text-bg-success">Approved</span>
                                                @elseif ($nib->status === 'rejected')
                                                    <span class="badge text-bg-danger">Rejected</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($nib->status === 'pending')
                                                    <!-- Tombol Approve -->
                                                    <form action="{{ route('pengajuan.approveNib', $nib->id) }}"
                                                        method="POST" style="display:inline-block;">
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-success">Approve</button>
                                                    </form>

                                                    <!-- Tombol Reject -->
                                                    <form action="{{ route('pengajuan.rejectNib', $nib->id) }}"
                                                        method="POST" style="display:inline-block;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Reject</button>
                                                    </form>
                                                @endif
                                                @if ($nib->status == 'rejected')
                                                    <form action="{{ url('/DeleteNib/' . $nib->id) }}" method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Page 3 -->
                        <div class="tab-pane fade" id="page3" role="tabpanel" aria-labelledby="page3-tab">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Company</th>
                                        <th>Schedule</th>
                                        <th>Food</th>
                                        <th>Drink</th>
                                        <th>Fruit</th>
                                        <th>Snack</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Example Row of Data -->
                                    <tr>
                                        @foreach ($food as $item)
                                            <td>{{ $item->company }}</td>
                                            <td>{{ $item->schedule }}</td>
                                            <td>{{ $item->food }}</td>
                                            <td>{{ $item->drink }}</td>
                                            <td>{{ $item->fruit }}</td>
                                            <td>{{ $item->snack }}</td>
                                            <td>
                                                @if ($item->status == 'approved')
                                                    <span class="badge text-bg-success">Approved</span>
                                                @endif
                                                @if ($item->status == 'pending')
                                                    <span class="badge text-bg-warning">Pending</span>
                                                @endif
                                                @if ($item->status == 'rejected')
                                                    <span class="badge text-bg-danger">Rejected</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($item->status == 'pending')
                                                    <div class="btn-group" role="group" aria-label="Actions">
                                                        <form action="{{ url('/approved/' . $item->id) }} "
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" value="approved" name="status">
                                                            <button
                                                                type="submit"class="btn btn-sm btn-success mx-1">Approved</button>
                                                        </form>

                                                        <div class="btn-group" role="group" aria-label="Actions">
                                                            <form action="{{ url('/rejected/' . $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" value="rejected"
                                                                    name="status">
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-danger mx-1">Reject</button>
                                                            </form>
                                                @endif

                                                @if ($item->status == 'rejected')
                                                    <form action="{{ url('/Delete/' . $item->id) }}" method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger mx-1">Delete</button>
                                                    </form>
                                                @endif
                                                @if ($item->status == 'approved')
                                                    <form action="{{ url('/Delete/' . $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger mx-1">Delete</button>
                                                    </form>
                                                @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Page 4 -->
                        <div class="tab-pane fade" id="page4" role="tabpanel" aria-labelledby="page4-tab">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Sub Title</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quota</th>
                                        <th scope="col">Course</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Pemateri</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Link</th>
                                        <th scope="col">Picture</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($training as $pelatihan)
                                        <tr>
                                            <td>{{ $pelatihan->id }}</td>
                                            <td>{{ $pelatihan->title }}</td>
                                            <td>{{ $pelatihan->sub }}</td>
                                            <td>{{ ucfirst($pelatihan->status) }}</td>
                                            <td>{{ $pelatihan->price }}</td>
                                            <td>{{ $pelatihan->quota }}</td>
                                            <td>{{ $pelatihan->cource }}</td>
                                            <td>{{ $pelatihan->date }}</td>
                                            <td>{{ $pelatihan->pemateri }}</td>
                                            <td>{{ $pelatihan->deskripsi }}</td>
                                            <td>{{ $pelatihan->zoom }}</td>
                                            <td>
                                                <img src="{{ asset('/storage/Peltihan/' . $pelatihan->poto) }}"
                                                    alt="Image" width="50" height="50" class="rounded">
                                            </td>


                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
