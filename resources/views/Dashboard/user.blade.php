<x-layouts> 
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
                            <img src="{{ asset('/storage/DefaultProfile/profile.png') }}" alt="Profile" width="40"
                                height="40" class="rounded-circle">
                        @else
                            <img src="{{ asset('/storage/profile/' . $data->picture) }}" alt="Profile" width="40"
                                height="40" class="rounded-circle">
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

    <x-sidebar>
        <div class="box-nav d-flex justify-content-center gap-4 mb-4 flex-wrap">
            <div class="card rounded-3 shadow border-0 text-center" style="width: 242px; height: 150px;">
                <a href="/profil"
                    class="text-decoration-none text-dark h-100 d-flex flex-column justify-content-center align-items-center">
                    <div class="icon fs-2 mb-2">
                        <i class="fi fi-rr-user"></i>
                    </div>
                    <h5>Lengkapi Profile</h5>
                </a>
            </div>

            <div class="card rounded-3 shadow border-0 text-center" style="width: 242px; height: 150px;">
                <a href="/Permohonan"
                    class="text-decoration-none text-dark h-100 d-flex flex-column justify-content-center align-items-center">
                    <div class="icon fs-2 mb-2">
                        <i class="fi fi-rr-document-signed"></i>
                    </div>
                    <h5>Permohonan</h5>
                </a>
            </div>
            <div class="card rounded-3 shadow border-0 text-center" style="width: 242px; height: 150px;">
                <a href="/surveyKepuasan"
                    class="text-decoration-none text-dark h-100 d-flex flex-column justify-content-center align-items-center">
                    <div class="icon fs-2 mb-2">
                        <i class="fi fi-rr-list-check"></i>
                    </div>
                    <h5>Survey Kepuasan</h5>
                </a>
            </div>
            <div class="card rounded-3 shadow border-0 text-center" style="width: 242px; height: 150px;">
                <a href="/inbox"
                    class="text-decoration-none text-dark h-100 d-flex flex-column justify-content-center align-items-center">
                    <div class="icon fs-2 mb-2">
                        <i class="fi fi-rr-ballot"></i>
                    </div>
                    <h5>Inbox</h5>
                </a>
            </div>
        </div>

        <h3 class="mb-4 text-center">Aktivitas</h3>
        <table class="table table-hover table-borderless rounded">
            <thead class="table">
                <tr>
                    <th scope="col" class="col-1 text-center">No</th>
                    <th scope="col">Nama Layanan</th>
                    <th scope="col" class="col-1 text-center">Permohonan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" class="text-center">1</th>
                    <td>Pengajuan Sertifikat Halal</td>
                    <td class="text-center">
                        <a href="/layanan/pengajuan" class="btn"
                            style="background-color: #6f42c1; color: white;">Pilih</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="text-center">2</th>
                    <td>Dokumen NIB</td>
                    <td class="text-center">
                        <a href="/layanan/dokumen" class="btn"
                            style="background-color: #6f42c1; color: white;">Pilih</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="text-center">3</th>
                    <td>Pelatihan Gratis</td>
                    <td class="text-center">
                        <a href="/layanan/pilihPelatihan" class="btn"
                            style="background-color: #6f42c1; color: white;">Pilih</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="text-center">4</th>
                    <td>Makan Siang Gratis</td>
                    <td class="text-center">
                        <a href="/layanan/makanSiang" class="btn"
                            style="background-color: #6f42c1; color: white;">Pilih</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </x-sidebar>

    {{-- js --}}
    <script>
        const sidebar = document.getElementById("collapsedSidebar");
        const toggleBtn = document.getElementById("toggleBtn");
        const mainDashboard = document.getElementById("mainDashboard");

        toggleBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            mainDashboard.classList.toggle("shifted");
        });

        document.addEventListener('DOMContentLoaded', function() {
            var successToastEl = document.getElementById('successToast');
            if (successToastEl) {
                var toast = new bootstrap.Toast(successToastEl);
                toast.show();
                setTimeout(function() {
                    toast.hide();
                }, 5000);
            }
        });
    </script>
</x-layouts>
