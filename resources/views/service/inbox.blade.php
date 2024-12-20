<x-layouts>
    <style>
        .update-item {
            transition: box-shadow 0.2s;
        }

        .update-item:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .rounded-3 {
            border-radius: 0.75rem;
            /* Increase roundness */
        }

        .shadow-lg {
            box-shadow: rgba(0, 0, 0, 0.2) 0px 10px 20px;
            /* More pronounced shadow */
        }

        .text-gray-dark {
            color: #343a40;
        }
    </style>
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
                        @if ($pic->picture === null)
                            <img src="{{ asset('/storage/DefaultProfile/profile.png') }}" alt="mdo" width="40"
                                height="40" class="rounded-circle">
                        @else
                            <img src="{{ asset('/storage/profile/' . $pic->picture) }}" alt="mdo" width="40"
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

            <h6 class="border-bottom pb-2 mb-4">Link Zoom Pelatihan</h6>
            <!-- Update Item 1 -->
            @foreach ($data as $inbox)
                <div class="update-item card mb-3" style="transition: transform 0.2s; cursor: pointer;">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <img src="{{ asset('/storage/Peltihan/' . $inbox->foto) }}" alt="mdo" width="50"
                                height="50" class="rounded-circle">
                        </div>
                        <div>
                            <strong class="d-block text-gray-dark">Nama Pelatihan : {{ $inbox->name }}</strong>
                            <p class="small mb-0">Link : {{ $inbox->zoom }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

            <h6 class="border-bottom pb-2 mb-4">Dokumen NIB</h6>
            <!-- Update Item 2 -->
            @foreach ($notifNib as $inbox)
                <div class="update-item card mb-3" style="transition: transform 0.2s; cursor: pointer;">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            @if ($pic->picture === null)
                                <img src="{{ asset('/storage/DefaultProfile/profile.png') }}" alt="mdo"
                                    width="40" height="40" class="rounded-circle">
                            @else
                                <img src="{{ asset('/storage/profile/' . $inbox->user->picture) }}" alt="mdo"
                                    width="50" height="50" class="rounded-circle">
                            @endif
                        </div>
                        <div>
                            <strong class="d-block text-gray-dark">{{ $inbox->name }}</strong>
                            <p class="text-muted small">Dokumen NIB : Sedang di Tinjau</p>
                        </div>
                    </div>
                </div>
            @endforeach

            <h6 class="border-bottom pb-2 mb-4">Sertifikat Halal</h6>
            <!-- Update Item 3 -->
            @foreach ($notifCerti as $inbox)
                <div class="update-item card mb-3" style="transition: transform 0.2s; cursor: pointer;">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            @if ($pic->picture === null)
                                <img src="{{ asset('/storage/DefaultProfile/profile.png') }}" alt="mdo"
                                    width="40" height="40" class="rounded-circle">
                            @else
                                <img src="{{ asset('/storage/profile/' . $inbox->user->picture) }}" alt="mdo"
                                    width="50" height="50" class="rounded-circle">
                            @endif
                        </div>
                        <div>
                            <strong class="d-block text-gray-dark">{{ $inbox->company_name }}</strong>
                            <p class="text-muted small">Sertifikat Halal : Sedang di Tinjau</p>
                        </div>
                    </div>
                </div>
            @endforeach

            <h6 class="border-bottom pb-2 mb-4">Makan Siang</h6>
            <!-- Update Item 4 -->
            @foreach ($notifFood as $inbox)
                <div class="update-item card mb-3" style="transition: transform 0.2s; cursor: pointer;">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            @if ($pic->picture === null)
                                <img src="{{ asset('/storage/DefaultProfile/profile.png') }}" alt="mdo"
                                    width="40" height="40" class="rounded-circle">
                            @else
                                <img src="{{ asset('/storage/profile/' . $inbox->user->picture) }}" alt="mdo"
                                    width="50" height="50" class="rounded-circle">
                            @endif
                        </div>
                        <div>
                            <strong class="d-block text-gray-dark">Company Name : {{ $inbox->company }}</strong>
                            <p class="text-muted small">Jadwal : {{ $inbox->schedule }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

            <h6 class="border-bottom pb-2 mb-4">Survey Kepuasan</h6>
            <!-- Update Item 5 -->
            @foreach ($notifRate as $inbox)
                <div class="update-item card mb-3" style="transition: transform 0.2s; cursor: pointer;">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            @if ($pic->picture === null)
                                <img src="{{ asset('/storage/DefaultProfile/profile.png') }}" alt="mdo"
                                    width="40" height="40" class="rounded-circle">
                            @else
                                <img src="{{ asset('/storage/profile/' . $inbox->user->picture) }}" alt="mdo"
                                    width="50" height="50" class="rounded-circle">
                            @endif
                        </div>
                        <div>
                            <strong class="d-block text-gray-dark">Company Name {{ $pic->company_name }}</strong>
                            <p class="text-muted small">Ulasan : {{ $inbox->comments }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- All updates link -->
            <small class="d-block text-end mt-3">
                <a href="#" class="text-decoration-none text-primary">View All Updates</a>
            </small>
        </div>
    </x-sidebar>

    {{-- Script JS --}}
    <script>
        const sidebar = document.getElementById("collapsedSidebar");
        const toggleBtn = document.getElementById("toggleBtn");
        const mainDashboard = document.getElementById("mainDashboard");

        toggleBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            mainDashboard.classList.toggle("shifted");
        });

        // Add hover effect for cards
        const updateItems = document.querySelectorAll('.update-item');
        updateItems.forEach(item => {
            item.addEventListener('mouseover', () => {
                item.style.transform = 'scale(1.02)';
            });
            item.addEventListener('mouseout', () => {
                item.style.transform = 'scale(1)';
            });
        });
    </script>

</x-layouts>
