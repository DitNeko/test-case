<x-layouts>
    {{-- custom css --}}
    <style>
        body {
            background: #ffffff;
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
            background-color: #ffffff;
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

        .select2-container .select2-selection--single {
            height: calc(2.25rem + 2px);
            /* Sama dengan tinggi input Bootstrap */
            padding: 0.375rem 0.75rem;
            /* Padding dari input Bootstrap */
        }

        /* Sesuaikan ukuran font */
        .select2-selection__rendered {
            font-size: 1rem;
        }

        /* Tambahkan border Bootstrap untuk elemen select2 */
        .select2-container--default .select2-selection--single {
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
        }

        /* Hover effect agar mirip dengan Bootstrap */
        .select2-container--default .select2-selection--single:hover {
            border-color: #86b7fe;
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

        {{-- sidebar --}}
    <div class="aside" id="collapsedSidebar">
        <div class="p-3">
            <a href="/dashboard" class="text-decoration-none "><h4 class="text-white mb-4 mt-3">Main Menu</h4></a> 
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
        {{-- sidebar end --}}

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
                        <form class="container mt-5" action="{{ route('req.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <h2 class="mb-4">Pengajuan Sertifikat Halal</h2>
                            <b class="mb-4">Informasi Umum</b>
                            
                            <div class="mb-4">
                                <label for="company_name" class="form-label">Company Name / Nama Perusahaan</label>
                                <input type="text" class="form-control" id="company_name" name="company_name"
                                       value="{{ old('company_name', session('company_name')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="address" class="form-label">Address / Alamat Perusahaan</label>
                                <input type="text" class="form-control" id="address" name="address"
                                       value="{{ old('address', session('address')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="city" class="form-label">City / Kota</label>
                                <input type="text" class="form-control" id="city" name="city"
                                       value="{{ old('city', session('city')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="country" class="form-label">Country / Negara</label>
                                <select class="form-select" id="country" name="country" aria-label="Default select example">
                                    <option value="">Open this select menu</option>
                                    @foreach ($countries as $code => $country)
                                        <option value="{{ $country['name'] }}"
                                            {{ old('country', session('country')) == $country['name'] ? 'selected' : '' }}>
                                            {{ $country['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-4">
                                <label for="zip_code" class="form-label">ZIP Code / Kode Pos</label>
                                <input type="number" class="form-control" id="zip_code" name="zip_code"
                                       value="{{ old('zip_code', session('zip_code')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="phone" class="form-label">Phone / Nomor Telp</label>
                                <input type="number" class="form-control" id="phone" name="phone"
                                       value="{{ old('phone', session('phone')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="fax" class="form-label">Fax / Nomor Fax</label>
                                <input type="number" class="form-control" id="fax" name="fax"
                                       value="{{ old('fax', session('fax')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="company_email" class="form-label">Company Email / Alamat Email Perusahaan</label>
                                <input type="email" class="form-control" id="company_email" name="company_email"
                                       value="{{ old('company_email', session('company_email')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="pic_name" class="form-label">Person in Charge (PIC) Name / Nama PIC</label>
                                <input type="text" class="form-control" id="pic_name" name="pic_name"
                                       value="{{ old('pic_name', session('pic_name')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="pic_title" class="form-label">PIC Title / Jabatan PIC</label>
                                <input type="text" class="form-control" id="pic_title" name="pic_title"
                                       value="{{ old('pic_title', session('pic_title')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="pic_phone" class="form-label">PIC Phone / Nomor Telp</label>
                                <input type="number" class="form-control" id="pic_phone" name="pic_phone"
                                       value="{{ old('pic_phone', session('pic_phone')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="pic_mobile_phone" class="form-label">PIC Mobile Phone / Nomor HP PIC</label>
                                <input type="number" class="form-control" id="pic_mobile_phone" name="pic_mobile_phone"
                                       value="{{ old('pic_mobile_phone', session('pic_mobile_phone')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="pic_email" class="form-label">PIC Email / Email PIC</label>
                                <input type="email" class="form-control" id="pic_email" name="pic_email"
                                       value="{{ old('pic_email', session('pic_email')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="cp_name" class="form-label">Contact Person (CP) Name / Nama CP</label>
                                <input type="text" class="form-control" id="cp_name" name="cp_name"
                                       value="{{ old('cp_name', session('cp_name')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="cp_title" class="form-label">CP Title / Jabatan CP</label>
                                <input type="text" class="form-control" id="cp_title" name="cp_title"
                                       value="{{ old('cp_title', session('cp_title')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="cp_phone" class="form-label">CP Phone / Nomor Telp CP</label>
                                <input type="number" class="form-control" id="cp_phone" name="cp_phone"
                                       value="{{ old('cp_phone', session('cp_phone')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="cp_mobile_phone" class="form-label">CP Mobile Phone / Nomor HP CP</label>
                                <input type="number" class="form-control" id="cp_mobile_phone" name="cp_mobile_phone"
                                       value="{{ old('cp_mobile_phone', session('cp_mobile_phone')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="cp_email" class="form-label">CP Email / Email CP</label>
                                <input type="email" class="form-control" id="cp_email" name="cp_email"
                                       value="{{ old('cp_email', session('cp_email')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="registration_type">Registration Type / Jenis Registrasi</label>
                                <select class="form-select" id="registration_type" name="registration_type"
                                    onchange="showSizeInput()" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="ManufacturingIndustry">industri pengolahan</option>
                                    <option value="Restaurant">restoran</option>
                                    <option value="SlaughterHouse">rumah potong hewan</option>
                                    <option value="Catering">katering</option>
                                    <option value="Kitchen">dapur</option>
                                    <option value="Services">jasa</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="application_type">Application Type / Tipe Aplikasi</label>
                                <select class="form-select" id="application_type" name="application_type"
                                    aria-label="Default select example">
                                    <option value="">Open this select menu</option>
                                    <option value="Regular">Regular</option>
                                    <option value="UAE">UAE</option>
                                    <option value="HAS">HAS</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="registration_status">Registration Status / Status Registrasi</label>
                                <select class="form-select" id="registration_status" name="registration_status"
                                    aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="Baru">Baru</option>
                                    <option value="Perpanjangan">Perpanjangan</option>
                                    <option value="Pengembangan">Pengembangan</option>
                                </select>
                            </div>

                            <div class="mb-4" id="size-input" style="display: none">
                                <label for="product_type">Jenis Produk</label>
                                <select class="form-select" id="product_type" name="product_type"
                                    aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="Foods and Beverages Service with Process">Penyediaan Makanan dan
                                        Minuman Dengan Pengolahan (Foods and Beverages Service with Process)</option>
                                    <option value="Foods and Beverages Service with Process">Penyediaan Makanan dan
                                        Minuman Dengan Pengolahan (Foods and Beverages Service with Process)</option>
                                    <option value="Meat and Processed Meat Products">Daging dan Produk Olahan Daging
                                        (Meat and Processed Meat Products)</option>
                                    <option value="Fish and Fishery Products">Ikan dan Produk Perikanan, Termasuk
                                        Moluska, Krustase, dan Ekinodermata Dengan Pengolahan dan Penambahan Bahan
                                        Tambahan Pangan (Fish and Fishery Products, Including Mollusca, Crustacean,
                                        Echinodhermata with Process and Additives)</option>
                                    <option value="Milk and Milk Analogues">Susu dan Analognya (Milk and Milk
                                        Analogues)</option>
                                    <option value="Processed Eggs and Egg Processed Products">Telur Olahan dan Produk-
                                        Produk Telur Hasil Olahan (Processed Eggs and Egg Processed Products)</option>
                                    <option value="Ready To Eat Meals">Pangan Siap Saji (Ready To Eat Meals)</option>
                                    <option value="Bakery Products">Produk Bakeri (Bakery Products)</option>
                                    <option value="Ready To Eat Snacks">Makanan Ringan Siap Santap (Ready To Eat
                                        Snacks)</option>
                                    <option value="Candy/Confectioneries and Chocolates">Kembang Gula/Permen dan
                                        Cokelat (Candy/Confectioneries and Chocolates)</option>
                                    <option value="Edible Ice, Including Sherbet and Sorbet">Es Untuk Dimakan (Edible
                                        Ice) Termasuk Sherbet dan Sorbet (Edible Ice, Including Sherbet and Sorbet)
                                    </option>
                                    <option value="Fats, Oils, and Oil Emulsions">Lemak, Minyak, dan Emulsi Minyak
                                        (Fats, Oils, and Oil Emulsions)</option>
                                    <option value="Salt, Spices, Soup, Sauce, Salad, and Protein Products">Garam,
                                        Rempah, Sup, Saus, Salad, Serta Produk Protein (Salt, Spices, Soup, Sauce,
                                        Salad, and Protein Products)</option>
                                    <option value="Sugar and Sweeteners, Including Honey">Gula dan Pemanis Termasuk
                                        Madu (Sugar and Sweeteners, Including Honey)</option>
                                    <option value="Traditional Medicines">Obat Tradisional (Traditional Medicines)
                                    </option>
                                    <option value="Health Supplements">Suplemen Kesehatan (Health Supplements)</option>
                                    <option value="Cosmetics">Kosmetika (Cosmetics)</option>
                                    <option value="Others">Lain-lain (Others)</option>
                                    <option value="Biological Products">Produk Biologi (Biological Products)</option>
                                    <option value="Beverage Ingredients">Kelompok Bahan Minuman (Beverage Ingredients)
                                    </option>
                                    <option value="Quasi Medicines">Obat Kuasi (Quasi Medicines)</option>
                                    <option value="Pharmacy Medicines">Obat Bebas Terbatas (Pharmacy Medicines)
                                    </option>
                                    <option value="Prescription Only Medicines, Excluding Narcotics and Psychotropic">
                                        Obat Keras Dikecualikan Narkotika dan Psikotropika (Prescription Only
                                        Medicines/Controlled Drugs, Excluding Narcotics and Psychotropic)</option>
                                    <option value="Drugs Ingredients">Bahan Obat (Drugs Ingredients)</option>
                                    <option value="Processing Aids">Kelompok Bahan Penolong (Processing Aids)</option>
                                    <option value="Genetic Modified Products">Produk rekayasa genetik (Genetic Modified
                                        Products)</option>
                                    <option value="Clothing">Sandang (Clothing)</option>
                                    <option value="Head Clothing">Penutup Kepala (Head Clothing)</option>
                                    <option value="Clothing Accessories">Aksesoris (Clothing Accessories)</option>
                                    <option value="Household Supplies">Peralatan Rumah Tangga (Household Supplies)
                                    </option>
                                    <option value="Moslem Praying Equipment">Perlengkapan Peribadatan Bagi Umat Islam
                                        (Moslem Praying Equipment)</option>
                                    <option value="Product Packaging">Kemasan Produk (Product Packaging)</option>
                                    <option value="Stationary">Alat Tulis dan Perlengkapan Kantor (Stationary)</option>
                                    <option value="Medical Devices">Alat Kesehatan (Medical Devices)</option>
                                    <option value="Consumer Good Materials">Bahan Penyusun Barang Gunaan (Consumer Good
                                        Materials)</option>
                                    <option value="Other Chemicals">Bahan Kimiawi Lainnya (Other Chemicals)</option>
                                    <option value="Beverages with Process">Minuman Dengan Pengolahan (Beverages with
                                        Process)</option>
                                    <option value="Over The Counter/General Sales List Drugs/Medicines">Obat Bebas
                                        (Over The Counter/General Sales List Drugs/Medicines)</option>
                                    <option value="Home Care Products">Perbekalan Kesehatan Rumah Tangga (Home Care
                                        Products)</option>
                                    <option value="Fruits and Vegetables with Process and Additives">Buah dan Sayur
                                        Dengan Pengolahan dan Penambahan Bahan Tambahan Pangan (Fruits & Vegetables with
                                        Process and Additives)</option>
                                    <option value="Cereals and Cereal Products">Serealia dan Produk Serealia Yang
                                        Merupakan Produk Turunan Dari Biji Serealia, Akar dan Umbi, Kacang- Kacangan dan
                                        Empulur Dengan Pengolahan dan Penambahan Bahan Tambahan Pangan (Cereals and
                                        Cereal Products Which Are Derivative Products From Cereal Seeds, Roots and
                                        Tubers, Nuts and Pith with Process and Additives)</option>
                                    <option value="Processed Foods For Special Nutrition Needs">Pangan Olahan Untuk
                                        Keperluan Gizi Khusus (Processed Foods For Special Nutrition Needs)</option>
                                    <option value="Other Ingredients">Kelompok Bahan Lainnya (Other Ingredients)
                                    </option>
                                    <option value="Additives">Bahan Tambahan Pangan (Additives)</option>
                                    <option value="Foods and Beverages Services without Process">Jasa Penyajian Tanpa
                                        Proses Pengolahan/ Memasak (Foods and Beverages Services without Process)
                                    </option>
                                    <option value="Foods and Beverages Service with Process">Penyediaan Makanan dan
                                        Minuman Dengan Pengolahan (Foods and Beverages Service with Process)</option>
                                    <option value="Manufacturing Service">Jasa Pengolahan (Manufacturing Service)
                                    </option>
                                    <option value="Packaging Service">Jasa Pengemasan (Packaging Service)</option>
                                    <option value="Product Transportation Service">Jasa Pendistribusian (Product
                                        Transportation Service)</option>
                                    <option value="Retailer">Jasa Penjualan Tanpa Proses Pengolahan/Memasak (Retailer)
                                    </option>
                                    <option value="Storage Service/Warehouse">Jasa Penyimpanan (Storage
                                        Service/Warehouse)</option>
                                    <option value="Slaughterhouse">Jasa Penyembelihan (Slaughterhouses)</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="product_marketing_type">Product marketing type / Tipe pemasaran
                                    produk</label>
                                <select class="form-select" id="product_marketing_type" name="product_marketing_type"
                                    aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="retail">retail</option>
                                    <option value="non retail">non retail</option>
                                    <option value="retail & non retail">retail & non retail</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="total_employee" class="form-label">Total Employee / Jumlah karyawan</label>
                                <input type="number" class="form-control" id="total_employee" name="total_employee"
                                    value="{{ old('total_employee', session('total_employee')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="production_capacity" class="form-label">Production Capacity / Kapasitas produksi</label>
                                <input type="number" class="form-control" id="production_capacity" name="production_capacity"
                                    value="{{ old('production_capacity', session('production_capacity')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="npwp_number" class="form-label">Nomor NPWP / NPWP Number (*Only for Indonesia Company)</label>
                                <input type="number" class="form-control" id="npwp_number" name="npwp_number"
                                    value="{{ old('npwp_number', session('npwp_number')) }}">
                            </div>
                            
                            <b class="mb-4">Facility Data / Data Fasilitas</b>
                            
                            <div class="mb-4">
                                <label for="facility_manufacturer_name" class="form-label">Manufacturer Name / Nama Pabrik</label>
                                <input type="text" class="form-control" id="facility_manufacturer_name" name="facility_manufacturer_name"
                                    value="{{ old('facility_manufacturer_name', session('facility_manufacturer_name')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="facility_manufacturer_address" class="form-label">Manufacturer Address / Alamat Pabrik</label>
                                <input type="text" class="form-control" id="facility_manufacturer_address" name="facility_manufacturer_address"
                                    value="{{ old('facility_manufacturer_address', session('facility_manufacturer_address')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="facility_city" class="form-label">City / Kota</label>
                                <input type="text" class="form-control" id="facility_city" name="facility_city"
                                    value="{{ old('facility_city', session('facility_city')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="facility_country" class="form-label">Country / Negara</label>
                                <select class="form-select" id="facility_country" name="facility_country" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    @foreach ($countries as $code => $country)
                                        <option value="{{ $country['name'] }}" {{ (old('facility_country', session('facility_country')) == $country['name']) ? 'selected' : '' }}>
                                            {{ $country['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-4">
                                <label for="facility_zip_code" class="form-label">ZIP Code / Kode Pos</label>
                                <input type="number" class="form-control" id="facility_zip_code" name="facility_zip_code"
                                    value="{{ old('facility_zip_code', session('facility_zip_code')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="facility_phone" class="form-label">Phone / Nomor Telp</label>
                                <input type="number" class="form-control" id="facility_phone" name="facility_phone"
                                    value="{{ old('facility_phone', session('facility_phone')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="facility_fax" class="form-label">Fax / Nomor Fax</label>
                                <input type="number" class="form-control" id="facility_fax" name="facility_fax"
                                    value="{{ old('facility_fax', session('facility_fax')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="facility_email" class="form-label">Facility Email / Alamat Email Pabrik</label>
                                <input type="email" class="form-control" id="facility_email" name="facility_email"
                                    value="{{ old('facility_email', session('facility_email')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="facility_pic_name" class="form-label">Person in Charge (PIC) Name / Nama PIC</label>
                                <input type="text" class="form-control" id="facility_pic_name" name="facility_pic_name"
                                    value="{{ old('facility_pic_name', session('facility_pic_name')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="facility_pic_title" class="form-label">PIC Title / Jabatan PIC</label>
                                <input type="text" class="form-control" id="facility_pic_title" name="facility_pic_title"
                                    value="{{ old('facility_pic_title', session('facility_pic_title')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="facility_pic_phone" class="form-label">PIC Phone / Nomor telp PIC</label>
                                <input type="number" class="form-control" id="facility_pic_phone" name="facility_pic_phone"
                                    value="{{ old('facility_pic_phone', session('facility_pic_phone')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="facility_pic_mobile_phone" class="form-label">PIC Mobile Phone / Nomor HP PIC</label>
                                <input type="number" class="form-control" id="facility_pic_mobile_phone" name="facility_pic_mobile_phone"
                                    value="{{ old('facility_pic_mobile_phone', session('facility_pic_mobile_phone')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="facility_pic_email" class="form-label">PIC Email / Alamat Email PIC</label>
                                <input type="email" class="form-control" id="facility_pic_email" name="facility_pic_email"
                                    value="{{ old('facility_pic_email', session('facility_pic_email')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="facility_cp_name" class="form-label">Contact Person (CP) Name / Nama CP</label>
                                <input type="text" class="form-control" id="facility_cp_name" name="facility_cp_name"
                                    value="{{ old('facility_cp_name', session('facility_cp_name')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="facility_cp_title" class="form-label">CP Title / Jabatan CP</label>
                                <input type="text" class="form-control" id="facility_cp_title" name="facility_cp_title"
                                    value="{{ old('facility_cp_title', session('facility_cp_title')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="facility_cp_phone" class="form-label">CP Phone / Nomor Telp CP</label>
                                <input type="number" class="form-control" id="facility_cp_phone" name="facility_cp_phone"
                                    value="{{ old('facility_cp_phone', session('facility_cp_phone')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="facility_cp_mobile_phone" class="form-label">CP Mobile Phone / Nomor HP CP</label>
                                <input type="number" class="form-control" id="facility_cp_mobile_phone" name="facility_cp_mobile_phone"
                                    value="{{ old('facility_cp_mobile_phone', session('facility_cp_mobile_phone')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="facility_cp_email" class="form-label">CP Email / Email CP</label>
                                <input type="email" class="form-control" id="facility_cp_email" name="facility_cp_email"
                                    value="{{ old('facility_cp_email', session('facility_cp_email')) }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="other_facility_name_and_address" class="form-label">Nama dan alamat fasilitas lain (seperti gudang eksternal, maklon, dll) (bila ada)</label>
                                <input type="text" class="form-control" id="other_facility_name_and_address" name="other_facility_name_and_address"
                                    value="{{ old('other_facility_name_and_address', session('other_facility_name_and_address')) }}">
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Kirim Pengajuan</button>
                            </div>
                        </form>
                    </table>
                </div>
            </div>
        </div>
        <!-- isi end -->
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

        function showSizeInput() {
            // Ambil nilai dari select yang terpilih
            const registration_type = document.getElementById('registration_type').value;
            const product_type = document.getElementById('product_type');

            // Tampilkan input warna baju berdasarkan gender yang dipilih
            if (registration_type === 'Catering') {
                document.getElementById('size-input').style.display = 'block'; // Tampilkan div ukuran
                // Hapus opsi yang tidak relevan untuk laki-laki
                product_type.innerHTML = `
            <option value="">Open this select menu</option>
            <option value="Foods and Beverages Service with Process">Penyediaan Makanan dan Minuman Dengan Pengolahan (Foods and Beverages Service with Process)</option>
        `;
            } else if (registration_type === 'Kitchen') {
                document.getElementById('size-input').style.display = 'block'; // Tampilkan div ukuran
                // Hapus opsi yang tidak relevan untuk perempuan
                product_type.innerHTML = `
            <option value="">Open this select menu</option>
            <option value="Foods and Beverages Service with Process">Penyediaan Makanan dan Minuman Dengan Pengolahan (Foods and Beverages Service with Process)</option>
        `;
            } else if (registration_type === 'ManufacturingIndustry') {
                document.getElementById('size-input').style.display = 'block'; // Tampilkan div ukuran
                // Hapus opsi yang tidak relevan untuk perempuan
                product_type.innerHTML = `
                                    <option selected>Open this select menu</option>
<option value="Meat and Processed Meat Products">Daging dan Produk Olahan Daging (Meat and Processed Meat Products)</option>
<option value="Fish and Fishery Products">Ikan dan Produk Perikanan, Termasuk Moluska, Krustase, dan Ekinodermata Dengan Pengolahan dan Penambahan Bahan Tambahan Pangan (Fish and Fishery Products, Including Mollusca, Crustacean, Echinodhermata with Process and Additives)</option>
<option value="Milk and Milk Analogues">Susu dan Analognya (Milk and Milk Analogues)</option>
<option value="Processed Eggs and Egg Processed Products">Telur Olahan dan Produk- Produk Telur Hasil Olahan (Processed Eggs and Egg Processed Products)</option>
<option value="Ready To Eat Meals">Pangan Siap Saji (Ready To Eat Meals)</option>
<option value="Bakery Products">Produk Bakeri (Bakery Products)</option>
<option value="Ready To Eat Snacks">Makanan Ringan Siap Santap (Ready To Eat Snacks)</option>
<option value="Candy/Confectioneries and Chocolates">Kembang Gula/Permen dan Cokelat (Candy/Confectioneries and Chocolates)</option>
<option value="Edible Ice, Including Sherbet and Sorbet">Es Untuk Dimakan (Edible Ice) Termasuk Sherbet dan Sorbet (Edible Ice, Including Sherbet and Sorbet)</option>
<option value="Fats, Oils, and Oil Emulsions">Lemak, Minyak, dan Emulsi Minyak (Fats, Oils, and Oil Emulsions)</option>
<option value="Salt, Spices, Soup, Sauce, Salad, and Protein Products">Garam, Rempah, Sup, Saus, Salad, Serta Produk Protein (Salt, Spices, Soup, Sauce, Salad, and Protein Products)</option>
<option value="Sugar and Sweeteners, Including Honey">Gula dan Pemanis Termasuk Madu (Sugar and Sweeteners, Including Honey)</option>
<option value="Traditional Medicines">Obat Tradisional (Traditional Medicines)</option>
<option value="Health Supplements">Suplemen Kesehatan (Health Supplements)</option>
<option value="Cosmetics">Kosmetika (Cosmetics)</option>
<option value="Others">Lain-lain (Others)</option>
<option value="Biological Products">Produk Biologi (Biological Products)</option>
<option value="Beverage Ingredients">Kelompok Bahan Minuman (Beverage Ingredients)</option>
<option value="Quasi Medicines">Obat Kuasi (Quasi Medicines)</option>
<option value="Pharmacy Medicines">Obat Bebas Terbatas (Pharmacy Medicines)</option>
<option value="Prescription Only Medicines, Excluding Narcotics and Psychotropic">Obat Keras Dikecualikan Narkotika dan Psikotropika (Prescription Only Medicines/Controlled Drugs, Excluding Narcotics and Psychotropic)</option>
<option value="Drugs Ingredients">Bahan Obat (Drugs Ingredients)</option>
<option value="Processing Aids">Kelompok Bahan Penolong (Processing Aids)</option>
<option value="Genetic Modified Products">Produk rekayasa genetik (Genetic Modified Products)</option>
<option value="Clothing">Sandang (Clothing)</option>
<option value="Head Clothing">Penutup Kepala (Head Clothing)</option>
<option value="Clothing Accessories">Aksesoris (Clothing Accessories)</option>
<option value="Household Supplies">Peralatan Rumah Tangga (Household Supplies)</option>
<option value="Moslem Praying Equipment">Perlengkapan Peribadatan Bagi Umat Islam (Moslem Praying Equipment)</option>
<option value="Product Packaging">Kemasan Produk (Product Packaging)</option>
<option value="Stationary">Alat Tulis dan Perlengkapan Kantor (Stationary)</option>
<option value="Medical Devices">Alat Kesehatan (Medical Devices)</option>
<option value="Consumer Good Materials">Bahan Penyusun Barang Gunaan (Consumer Good Materials)</option>
<option value="Other Chemicals">Bahan Kimiawi Lainnya (Other Chemicals)</option>
<option value="Beverages with Process">Minuman Dengan Pengolahan (Beverages with Process)</option>
<option value="Over The Counter/General Sales List Drugs/Medicines">Obat Bebas (Over The Counter/General Sales List Drugs/Medicines)</option>
<option value="Home Care Products">Perbekalan Kesehatan Rumah Tangga (Home Care Products)</option>
<option value="Fruits and Vegetables with Process and Additives">Buah dan Sayur Dengan Pengolahan dan Penambahan Bahan Tambahan Pangan (Fruits & Vegetables with Process and Additives)</option>
<option value="Cereals and Cereal Products">Serealia dan Produk Serealia Yang Merupakan Produk Turunan Dari Biji Serealia, Akar dan Umbi, Kacang- Kacangan dan Empulur Dengan Pengolahan dan Penambahan Bahan Tambahan Pangan (Cereals and Cereal Products Which Are Derivative Products From Cereal Seeds, Roots and Tubers, Nuts and Pith with Process and Additives)</option>
<option value="Processed Foods For Special Nutrition Needs">Pangan Olahan Untuk Keperluan Gizi Khusus (Processed Foods For Special Nutrition Needs)</option>
<option value="Other Ingredients">Kelompok Bahan Lainnya (Other Ingredients)</option>
<option value="Additives">Bahan Tambahan Pangan (Additives)</option>
        `;
            } else if (registration_type === 'Restaurant') {
                document.getElementById('size-input').style.display = 'block'; // Tampilkan div ukuran
                // Hapus opsi yang tidak relevan untuk perempuan
                product_type.innerHTML = `
            <option value="">Open this select menu</option>
            <option value="Foods and Beverages Services without Process">Jasa Penyajian Tanpa Proses Pengolahan/ Memasak (Foods and Beverages Services without Process)</option>
            <option value="Foods and Beverages Service with Process">Penyediaan Makanan dan Minuman Dengan Pengolahan (Foods and Beverages Service with Process)</option>
        `;
            } else if (registration_type === 'Services') {
                document.getElementById('size-input').style.display = 'block'; // Tampilkan div ukuran
                // Hapus opsi yang tidak relevan untuk perempuan
                product_type.innerHTML = `
                    <option value="">Open this select menu</option>
                    <option value="Manufacturing Service">Jasa Pengolahan (Manufacturing Service)</option>
                    <option value="Packaging Service">Jasa Pengemasan (Packaging Service)</option>
                    <option value="Product Transportation Service">Jasa Pendistribusian (Product Transportation Service)</option>
                    <option value="Retailer">Jasa Penjualan Tanpa Proses Pengolahan/Memasak (Retailer)</option>
                    <option value="Storage Service/Warehouse">Jasa Penyimpanan (Storage Service/Warehouse)</option>
        `;
            } else if (registration_type === 'SlaughterHouse') {
                document.getElementById('size-input').style.display = 'block'; // Tampilkan div ukuran
                // Hapus opsi yang tidak relevan untuk perempuan
                product_type.innerHTML = `
            <option value="">Open this select menu</option>
            <option value="Slaughterhouse">Jasa Penyembelihan (Slaughterhouses)</option>
        `;
            } else {
                document.getElementById('size-input').style.display =
                'none'; // Sembunyikan div ukuran jika tidak ada yang dipilih
            }
        }
    </script>
</x-layouts>
