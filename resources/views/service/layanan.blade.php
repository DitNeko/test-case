<x-layouts>
    {{-- header --}}
    <header class="p-3" style="height: 10vh;">
        <div class="container-fluid">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <div class="gap-1 d-flex">
                    <button class="border-0" style="background-color: #ffffff;" id="toggleBtn"><i
                            class="fi fi-rr-menu-burger"></i></button>
                            <img src="images/1720752709883.png" alt="Chlorine Logo" width="50" height="40">
                            <span class="fs-5 fw-bold mb-0 link-body-emphasis text-decoration-none">TrustyBite</span>
                </div>

                <div class="dropdown text-end">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @if ($data->picture === null)
                            <img src="{{ asset('/storage/DefaultProfile/profile.png') }}" alt="mdo" width="40"
                                height="40" class="rounded-circle">
                        @else
                            <img src="{{ asset('/storage/profile/' . $data->picture) }}" alt="mdo" width="40"
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
            <!-- isi -->
            <h3 class="mb-3">Layanan</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="col-1">No</th>
                        <th scope="col">Nama Layanan</th>
                        <th scope="col" class="col-1">Permohonan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="text-center">1</th>
                        <td>Pengajuan Sertifikat Halal</td>
                        <td class="text-center">
                            <a href="/layanan/pengajuan" class="btn" style="background-color: #6f42c1; color: white;">Pilih</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center">2</th>
                        <td>Dokumen NIB</td>
                        <td class="text-center">
                            <a href="/layanan/dokumen" class="btn" style="background-color: #6f42c1; color: white;">Pilih</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center">3</th>
                        <td>Pelatihan Gratis</td>
                        <td class="text-center">
                            <a href="/layanan/pilihPelatihan" class="btn" style="background-color: #6f42c1; color: white;">Pilih</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center">4</th>
                        <td>Makan Siang Gratis</td>
                        <td class="text-center">
                            <a href="/layanan/makanSiang" class="btn" style="background-color: #6f42c1; color: white;">Pilih</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- isi -->
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
    </script>
</x-layouts>
