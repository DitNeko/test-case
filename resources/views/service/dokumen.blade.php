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

        .aside.open {
            left: -250px;
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

        .form-section {
            display: none;
        }

        .form-section.active {
            display: block;
        }

        .conditional-input {
            display: none;
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
                            @if ($data->picture === null)
                                <img src="{{ asset('/storage/DefaultProfile/profile.png') }}" alt="mdo"
                                    width="40" height="40" class="rounded-circle">
                            @else
                                <img src="{{ asset('/storage/profile/' . $data->picture) }}" alt="mdo"
                                    width="50" height="50" class="rounded-circle">
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

        {{-- sidebar --}}
        <div class="aside" id="collapsedSidebar">
            <div class="p-3">
                <a href="/dashboard" class="text-decoration-none ">
                    <h4 class="text-white mb-4 mt-3">Main Menu</h4>
                </a>
                <ul class="list-unstyled">
                    <li>
                        <a href="/dashboard" class="text-sidebar text-decoration-none ms-2 d-flex align-items-center">
                            <i class="fi fi-rr-home"></i> Beranda
                        </a>
                    </li>
                    <li>
                        <a href="/inbox" class="text-sidebar text-decoration-none ms-2 d-flex align-items-center">
                            <i class="fi fi-rr-inbox-in"></i> Inbox
                        </a>
                    </li>
                    <li>
                        <a href="/layanan" class="text-sidebar text-decoration-none ms-2 d-flex align-items-center">
                            <i class="fi fi-rr-settings"></i> Layanan
                        </a>
                    </li>
                    <li>
                        <a href="/Permohonan" class="text-sidebar text-decoration-none ms-2 d-flex align-items-center">
                            <i class="fi fi-rr-envelope-download"></i> Permohonan Saya
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-sidebar text-decoration-none ms-2 d-flex align-items-center">
                            <i class="fi fi-rr-test"></i> Survey Kepuasan
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
                        <h2 class="mb-4">Pengajuan Dokumen NIB (Nomor Induk Berusaha)</h2>
                        <b class="mb-4">DATA PELAKU USAHA</b>
                        <form id="businessForm" action="{{ url('layanan/dokumen') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="number" class="form-control" id="nik" name="nik"
                                    value="{{ old('nik', session('nik')) }}">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', session('name')) }}">
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="gender" name="gender">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="male"
                                        {{ old('gender', session('gender')) == 'male' ? 'selected' : '' }}>Laki-laki
                                    </option>
                                    <option value="female"
                                        {{ old('gender', session('gender')) == 'female' ? 'selected' : '' }}>Perempuan
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Telepon</label>
                                <input type="number" class="form-control" id="phone" name="phone"
                                    value="{{ old('phone', session('phone')) }}">
                            </div>
                            <div class="mb-3">
                                <label for="id_card_address" class="form-label">Alamat KTP</label>
                                <input type="text" class="form-control" id="id_card_address"
                                    name="id_card_address"
                                    value="{{ old('id_card_address', session('id_card_address')) }}">
                            </div>
                            <div class="mb-3">
                                <label for="personal_npwp" class="form-label">NPWP Pribadi</label>
                                <input type="text" class="form-control" id="personal_npwp" name="personal_npwp"
                                    value="{{ old('personal_npwp', session('personal_npwp')) }}">
                            </div>
                            <div class="mb-3">
                                <label for="company_import_decision" class="form-label">Keputusan Impor
                                    Perusahaan</label>
                                <select class="form-select" id="company_import_decision"
                                    name="company_import_decision">
                                    <option value="">Pilih</option>
                                    <option value="yes"
                                        {{ old('company_import_decision', session('company_import_decision')) == 'yes' ? 'selected' : '' }}>
                                        Ya</option>
                                    <option value="no"
                                        {{ old('company_import_decision', session('company_import_decision')) == 'no' ? 'selected' : '' }}>
                                        Tidak</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="has_bpjs_employment" class="form-label">Memiliki BPJS
                                    Ketenagakerjaan</label>
                                <select class="form-select" id="has_bpjs_employment" name="has_bpjs_employment">
                                    <option value="">Pilih</option>
                                    <option value="yes"
                                        {{ old('has_bpjs_employment', session('has_bpjs_employment')) == 'yes' ? 'selected' : '' }}>
                                        Ya</option>
                                    <option value="no"
                                        {{ old('has_bpjs_employment', session('has_bpjs_employment')) == 'no' ? 'selected' : '' }}>
                                        Tidak</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="has_bpjs_health" class="form-label">Memiliki BPJS Kesehatan</label>
                                <select class="form-select" id="has_bpjs_health" name="has_bpjs_health">
                                    <option value="">Pilih</option>
                                    <option value="yes"
                                        {{ old('has_bpjs_health', session('has_bpjs_health')) == 'yes' ? 'selected' : '' }}>
                                        Ya</option>
                                    <option value="no"
                                        {{ old('has_bpjs_health', session('has_bpjs_health')) == 'no' ? 'selected' : '' }}>
                                        Tidak</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="is_npwp_different" class="form-label">NPWP Berbeda?</label>
                                <select class="form-select" id="is_npwp_different" name="is_npwp_different">
                                    <option value="">Pilih</option>
                                    <option value="yes"
                                        {{ old('is_npwp_different', session('is_npwp_different')) == 'yes' ? 'selected' : '' }}>
                                        Ya</option>
                                    <option value="no"
                                        {{ old('is_npwp_different', session('is_npwp_different')) == 'no' ? 'selected' : '' }}>
                                        Tidak</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="business_name" class="form-label">Nama Usaha</label>
                                <input type="text" class="form-control" id="business_name" name="business_name"
                                    value="{{ old('business_name', session('business_name')) }}">
                            </div>
                            <div class="mb-3">
                                <label for="kbli" class="form-label">KBLI</label>
                                <input type="text" class="form-control" id="kbli" name="kbli"
                                    value="{{ old('kbli', session('kbli')) }}">
                            </div>
                            <div class="mb-3">
                                <label for="business_scala" class="form-label">Skala Usaha</label>
                                <select class="form-select" id="business_scala" name="business_scala">
                                    <option value="">Pilih</option>
                                    <option value="UMKM"
                                        {{ old('business_scala', session('business_scala')) == 'UMKM' ? 'selected' : '' }}>
                                        UMKM</option>
                                    <option value="Non-UMKM"
                                        {{ old('business_scala', session('business_scala')) == 'Non-UMKM' ? 'selected' : '' }}>
                                        Non-UMKM</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="business_address" class="form-label">Alamat Usaha</label>
                                <input type="text" class="form-control" id="business_address"
                                    name="business_address"
                                    value="{{ old('business_address', session('business_address')) }}">
                            </div>
                            <div class="mb-3">
                                <label for="province" class="form-label">Provinsi</label>
                                <input type="text" class="form-control" id="province" name="province"
                                    value="{{ old('province', session('province')) }}">
                            </div>
                            <div class="mb-3">
                                <label for="regency" class="form-label">Kabupaten</label>
                                <input type="text" class="form-control" id="regency" name="regency"
                                    value="{{ old('regency', session('regency')) }}">
                            </div>
                            <div class="mb-3">
                                <label for="subdistrict" class="form-label">Kecamatan</label>
                                <input type="text" class="form-control" id="subdistrict" name="subdistrict"
                                    value="{{ old('subdistrict', session('subdistrict')) }}">
                            </div>
                            <div class="mb-3">
                                <label for="ward" class="form-label">Kelurahan</label>
                                <input type="text" class="form-control" id="ward" name="ward"
                                    value="{{ old('ward', session('ward')) }}">
                            </div>
                            <div class="mb-3">
                                <label for="pos_code" class="form-label">Kode Pos</label>
                                <input type="number" class="form-control" id="pos_code" name="pos_code"
                                    value="{{ old('pos_code', session('pos_code')) }}">
                            </div>
                            <div class="mb-3">
                                <label for="business_capital" class="form-label">Modal Usaha</label>
                                <input type="number" class="form-control" id="business_capital"
                                    name="business_capital"
                                    value="{{ old('business_capital', session('business_capital')) }}">
                            </div>
                            <div class="mb-3">
                                <label for="business_description" class="form-label">Deskripsi Usaha</label>
                                <textarea class="form-control" id="business_description" name="business_description">{{ old('business_description', session('business_description')) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="indonesian_workers" class="form-label">Jumlah Pekerja Indonesia</label>
                                <input type="number" class="form-control" id="indonesian_workers"
                                    name="indonesian_workers"
                                    value="{{ old('indonesian_workers', session('indonesian_workers')) }}">
                            </div>
                            <div class="mb-3">
                                <label for="business_status" class="form-label">Status Usaha</label>
                                <select class="form-select" id="business_status" name="business_status">
                                    <option value="">Pilih</option>
                                    <option value="sudah"
                                        {{ old('business_status', session('business_status')) == 'sudah' ? 'selected' : '' }}>
                                        Sudah</option>
                                    <option value="belum"
                                        {{ old('business_status', session('business_status')) == 'belum' ? 'selected' : '' }}>
                                        Belum</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="new_building_plan" class="form-label">Rencana Bangunan Baru</label>
                                <select class="form-select" id="new_building_plan" name="new_building_plan">
                                    <option value="">Pilih</option>
                                    <option value="yes"
                                        {{ old('new_building_plan', session('new_building_plan')) == 'yes' ? 'selected' : '' }}>
                                        Ya</option>
                                    <option value="no"
                                        {{ old('new_building_plan', session('new_building_plan')) == 'no' ? 'selected' : '' }}>
                                        Tidak</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="business_type" class="form-label">Tipe Usaha</label>
                                <div>
                                    <input type="radio" id="darat" name="business_type" value="darat">
                                    <label for="darat">Usaha Darat</label>
                                </div>
                                <div>
                                    <input type="radio" id="laut" name="business_type" value="laut">
                                    <label for="laut">Usaha Laut</label>
                                </div>
                                <div>
                                    <input type="radio" id="hutan" name="business_type" value="hutan">
                                    <label for="hutan">Usaha Hutan</label>
                                </div>
                            </div>

                            <div id="daratInputs" class="conditional-input">
                                <div class="mb-3">
                                    <label for="land_based_business_location" class="form-label">Lokasi Usaha
                                        Darat</label>
                                    <input type="text" class="form-control" id="land_based_business_location"
                                        name="land_based_business_location">
                                </div>
                            </div>

                            <div id="lautInputs" class="conditional-input">
                                <div class="mb-3">
                                    <label for="required_area" class="form-label">Luas Area yang Diperlukan</label>
                                    <input type="number" class="form-control" id="required_area"
                                        name="required_area">
                                </div>
                                <div class="mb-3">
                                    <label for="required_length" class="form-label">Panjang yang Diperlukan</label>
                                    <input type="number" class="form-control" id="required_length"
                                        name="required_length">
                                </div>
                                <div class="mb-3">
                                    <label for="location_depth" class="form-label">Kedalaman Lokasi</label>
                                    <input type="number" class="form-control" id="location_depth"
                                        name="location_depth">
                                </div>
                                <div class="mb-3">
                                    <label for="building_plan_area" class="form-label">Luas Rencana Bangunan</label>
                                    <input type="number" class="form-control" id="building_plan_area"
                                        name="building_plan_area">
                                </div>
                                <div class="mb-3">
                                    <label for="spatial_compatibility" class="form-label">Apakah atas lokasi dan
                                        kegiatan yang diajukan telah memiliki kesesuaian kegiatan pemanfaatan
                                        ruang?</label>
                                    <select class="form-select" id="spatial_compatibility"
                                        name="spatial_compatibility">
                                        <option value="">Pilih</option>
                                        <option value="yes">Ya</option>
                                        <option value="no">Tidak</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="reclamation" class="form-label">Reklamasi</label>
                                    <select class="form-select" id="reclamation" name="reclamation">
                                        <option value="">Pilih</option>
                                        <option value="yes">Ya</option>
                                        <option value="no">Tidak</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="water_name" class="form-label">Nama Perairan</label>
                                    <input type="text" class="form-control" id="water_name" name="water_name">
                                </div>
                                <div class="mb-3">
                                    <label for="coordinates" class="form-label">Koordinat</label>
                                    <input type="text" class="form-control" placeholder="6°12'00&quot;S, 106°49'00&quot;E" id="coordinates" name="coordinates">
                                </div>
                                <div class="mb-3">
                                    <label for="cross_province_location" class="form-label">Lokasi Antar
                                        Provinsi</label>
                                    <select class="form-select" id="cross_province_location"
                                        name="cross_province_location">
                                        <option value="">Pilih</option>
                                        <option value="yes">Ya</option>
                                        <option value="no">Tidak</option>
                                    </select>
                                </div>
                            </div>

                            {{-- hutan --}}
                            <div id="hutanInputs" class="conditional-input">
                                <div class="mb-3">
                                    <label for="business_land_area" class="form-label">Luas Lahan Usaha Hutan</label>
                                    <input type="number" class="form-control" id="business_land_area"
                                        name="business_land_area">
                                </div>
                                <div class="mb-3">
                                    <label for="forest_approval_status" class="form-label">Status Persetujuan
                                        Hutan</label>
                                    <select class="form-select" id="forest_approval_status"
                                        name="forest_approval_status">
                                        <option value="">Pilih</option>
                                        <option value="sudah">Sudah</option>
                                        <option value="belum">Belum</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="required_forest_permit_type" class="form-label">Tipe Izin Hutan yang
                                        Diperlukan</label>
                                    <select class="form-select" id="required_forest_permit_type"
                                        name="required_forest_permit_type">
                                        <option value="">Pilih</option>
                                        <option value="Penggunaan Kawasan Hutan">Penggunaan Kawasan Hutan</option>
                                        <option value="Pelepasan Kawasan Hutan">Pelepasan Kawasan Hutan</option>
                                        <option value="Pemanfaatan Hutan">Pemanfaatan Hutan</option>
                                        <option value="Konversi Kawasan">Konversi Kawasan</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </table>
                </div>
            </div>
        </div>
        <!-- isi end -->
        {{-- js --}}

        <script>
            const sidebar = document.getElementById("collapsedSidebar");
            const toggleBtn = document.getElementById("toggleBtn");
            const mainDashboard = document.getElementById("mainDashboard");

            toggleBtn.addEventListener("click", () => {
                sidebar.classList.toggle("open");
                mainDashboard.classList.toggle("shifted");
            });

            const businessTypeRadios = document.querySelectorAll('input[name="business_type"]');
            const daratInputs = document.getElementById('daratInputs');
            const lautInputs = document.getElementById('lautInputs');
            const hutanInputs = document.getElementById('hutanInputs');

            businessTypeRadios.forEach((radio) => {
                radio.addEventListener('change', () => {
                    if (radio.value === 'darat') {
                        daratInputs.style.display = 'block';
                        lautInputs.style.display = 'none';
                        hutanInputs.style.display = 'none';
                    } else if (radio.value === 'laut') {
                        daratInputs.style.display = 'none';
                        lautInputs.style.display = 'block';
                        hutanInputs.style.display = 'none';
                    } else if (radio.value === 'hutan') {
                        daratInputs.style.display = 'none';
                        lautInputs.style.display = 'none';
                        hutanInputs.style.display = 'block';
                    }
                });
            });
        </script>
</x-layouts>
