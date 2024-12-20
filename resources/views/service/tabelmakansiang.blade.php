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
        <h3 class="mb-3">Tabel Makan Siang</h3>
        @if (session('success'))
            <div class="toast-container position-fixed top-0 end-0 p-3">
                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="successToast">
                    <div class="toast-header bg-success">
                        <img src="Icons/notification-bell.png" class="rounded me-2" alt="...">
                        <strong class="me-auto">Notifikasi</strong>
                        <!-- Menampilkan waktu toast muncul -->
                        <small>{{ now()->format('H:i:s') }}</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nama Persahaan</th>
                    <th scope="col">Jadwal</th>
                    <th scope="col">Makanan</th>
                    <th scope="col">Minuman</th>
                    <th scope="col">Buah</th>
                    <th scope="col">Cemilan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
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
                        <td>
                            @if ($item->status == 'pending')
                            @elseif ($item->status == 'approved')
                                <a href="{{ url('/layanan/makanSiang/' . $item->id . '/edit') }}"
                                    class="btn btn-sm btn-primary mx-1">Edit</a>
                            @elseif ($item->status == 'rejected')
                                <form onsubmit="return confirm('are you sure')"
                                    action="{{ url('/layanan/makanSiang/' . $item->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" name="submit">Delete</button>
                                </form>
                            @else
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <div class="d-flex flex-row-reverse">
            <div class="p-"> <a href="/layanan/makanSiang/create"
                    class="btn btn-md btn-primary ps-5 pe-5 pt-2 pb-2">Ajukan</a></div>

        </div>


        <!-- isi end -->
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
