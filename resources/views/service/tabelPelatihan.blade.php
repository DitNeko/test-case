<x-layouts>
    {{-- custom css --}}
    <style>
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
    </style>
    <x-header>
        {{-- sidebar --}}
        <div class="aside" id="collapsedSidebar">
        <div class="p-3">
            <a href="/admin/dashboard" class="text-decoration-none "><h4 class="text-white mb-4 mt-3">Main Menu</h4></a> 
            <ul class="list-unstyled">
                <li>
                    <a href="/admin/dashboard" class="text-sidebar text-decoration-none ms-2 d-flex align-items-center">
                        <i class="fi fi-rr-home"></i> Beranda
                    </a>
                </li>
                <li>
                    <a href="/InboxAdmin" class="text-sidebar text-decoration-none ms-2 d-flex align-items-center">
                        <i class="fi fi-rr-inbox-in"></i> Inbox
                    </a>
                </li>
                <li>
                    <a href="/ajukanPelatihan/create" class="text-sidebar text-decoration-none ms-2 d-flex align-items-center">
                        <i class="fi fi-rr-settings"></i> Jadwal Pelatihan Gratis
                    </a>
                </li>
                <li>
                    <a href="/ajukanPelatihan" class="text-sidebar text-decoration-none ms-2 d-flex align-items-center">
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
                    <h3 class="mb-3">Tabel Pelatihan</h3>
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
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelatihans as $pelatihan)
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
                                        <img src="{{ asset('/storage/Peltihan/' . $pelatihan->poto) }}" alt="Image"
                                            width="50" height="50" class="rounded">
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <!-- Edit Button -->
                                            <button type="button" class="btn btn-sm btn-primary mx-1"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editLinkModal-{{ $pelatihan->id }}">
                                                Edit Link
                                            </button>

                                            <!-- Delete Form -->
                                            <form action="{{ url('/ajukanPelatihan/' . $pelatihan->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger mx-1" type="submit"
                                                    name="submit">Delete</button>
                                            </form>
                                        </div>

                                        <!-- Modal for Editing Link -->
                                        <div class="modal fade" id="editLinkModal-{{ $pelatihan->id }}" tabindex="-1"
                                            aria-labelledby="editLinkModalLabel-{{ $pelatihan->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="editLinkModalLabel-{{ $pelatihan->id }}">Edit Link for
                                                            {{ $pelatihan->title }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('/ajukanPelatihan/' . $pelatihan->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')

                                                            <!-- Zoom Link Input -->
                                                            <div class="mb-3">
                                                                <label for="zoom-link-{{ $pelatihan->id }}"
                                                                    class="form-label">Zoom Link</label>
                                                                <input type="text" class="form-control"
                                                                    id="zoom-link-{{ $pelatihan->id }}" name="link"
                                                                    value="{{ $pelatihan->zoom }}" required>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Update
                                                                Link</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- isi end -->
    </x-header>

    <!-- Modal -->


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
