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
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8 p-4 bg-white rounded-3 shadow">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Terjadi kesalahan!</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <h2 class="mb-4 text-center">Edit Profile</h2>

                        <form action="{{ url('/profil/' . $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Nama Usaha -->
                            <div class="mb-3">
                                <label for="autoSizingInput" class="form-label fw-bold">Nama Usaha</label>
                                <input type="text" value="{{ $user->company_name }}" name="name_company"
                                    class="form-control" id="autoSizingInput" required>
                            </div>

                            <!-- Nama -->
                            <div class="mb-3">
                                <label for="nama" class="form-label fw-bold">Nama</label>
                                <input type="text" value="{{ $user->name }}" name="nama" class="form-control"
                                    id="nama" placeholder="Masukkan nama Anda" required>
                            </div>

                            <!-- No Handphone -->
                            <div class="mb-3">
                                <label for="no_hp" class="form-label fw-bold">No Handphone</label>
                                <input type="tel" value="{{ $user->no_phone }}" name="no_hp" class="form-control"
                                    id="no_hp" readonly>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Email</label>
                                <input type="email" value="{{ $user->email }}" name="email" class="form-control"
                                    id="email" readonly>
                            </div>

                            <!-- Logo -->
                            <div class="mb-3">
                                <label for="profile" class="form-label fw-bold">Logo</label>
                                <input type="file" class="form-control" id="profile" name="profile"
                                    accept="image/*">
                            </div>

                            <!-- Alamat -->
                            <div class="mb-3">
                                <label for="addres" class="form-label fw-bold">Alamat</label>
                                <input type="text" value="{{ $user->address }}" name="addres" class="form-control"
                                    id="addres" readonly>
                            </div>

                            <!-- Bio -->
                            <div class="mb-3">
                                <label for="bio" class="form-label fw-bold">Bio</label>
                                <input type="text" value="{{ $user->bio }}" name="bio" class="form-control"
                                    id="bio" placeholder="Ceritakan sedikit tentang catering Anda" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
