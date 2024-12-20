<x-layouts>
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
                        @if ($data->picture === null)
                        <img src="{{ asset('/storage/DefaultProfile/profile.png') }}" alt="mdo" width="40"
                        height="40" class="rounded-circle">
                        @else
                        <img src="{{ asset('/storage/profile/' . $data->picture) }}" alt="mdo" width="40" height="40" class="rounded-circle">
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
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-md-10 mx-auto p-4 bg-white rounded-3 shadow-lg">
                    <div class="text-center mb-4">
                        @if ($data->picture === null)
                        <img src="{{ asset('/storage/DefaultProfile/profile.png') }}" 
                        alt="Profile Picture" 
                        class="rounded-circle border border-secondary"
                        style="width: 130px; height: 130px; object-fit: cover;">
                        @else
                        <img src="{{ asset('/storage/profile/' . $data->picture) }}" 
                            alt="Profile Picture" 
                            class="rounded-circle border border-secondary"
                            style="width: 130px; height: 130px; object-fit: cover;">
                        @endif
                        <h2 class="mt-3">My Profile</h2>
                    </div>

                    <form>
                        <div class="mb-3">
                            <label class="form-label fw-bold" for="company_name">Nama Usaha</label>
                            <input type="text" value="{{ $data->company_name }}" 
                                class="form-control" id="company_name" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" for="nama">Nama</label>
                            <input type="text" value="{{ $data->name }}" 
                                class="form-control" id="nama" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" for="no_hp">No Handphone</label>
                            <input type="tel" value="{{ $data->no_phone }}" 
                                class="form-control" id="no_hp" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" for="email">Email</label>
                            <input type="email" value="{{ $data->email }}" 
                                class="form-control" id="email" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" for="password">Password</label>
                            <input type="password" value="********" 
                                class="form-control" id="password" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" for="addres">Alamat</label>
                            <input type="text" value="{{ $data->address }}" 
                                class="form-control" id="addres" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" for="bio">Bio</label>
                            <input type="text" value="{{ $data->bio }}" 
                                class="form-control" id="bio" readonly>
                        </div>

                        <div class="d-grid mt-4">
                            <a href="{{ url('/profil/' . $data->id . '/edit') }}" 
                               class="btn btn-primary">
                                Edit Profile
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-sidebar>

    {{-- JavaScript --}}
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
