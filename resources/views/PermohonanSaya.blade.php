<x-layouts>
    <style>
        .table-responsive {
            max-height: 500px;
            overflow-y: auto;
        }

        .sticky-header th {
            position: sticky;
            top: 0;
            background-color: #343a40;
            color: white;
            z-index: 2;
            text-align: center;
        }

        td,
        th {
            padding: 10px;
            text-align: left;
            white-space: nowrap;
        }

        .table-striped tbody tr:hover {
            background-color: #f1f1f1;
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

            @php
                $i = 1;
            @endphp


            <!-- isi -->
            <h3 class="mb-3">Permohonan Saya</h3>
            <!-- Tab Navigation -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="page1-tab" data-bs-toggle="tab" data-bs-target="#page1"
                        type="button" role="tab" aria-controls="page1" aria-selected="true">Sertifikat
                        Halal</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="page2-tab" data-bs-toggle="tab" data-bs-target="#page2" type="button"
                        role="tab" aria-controls="page2" aria-selected="false">Dokumen
                        NIB</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="page3-tab" data-bs-toggle="tab" data-bs-target="#page3" type="button"
                        role="tab" aria-controls="page3" aria-selected="false">Makan
                        Siang Gratis</button>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <!-- Page 1 -->
                <div class="tab-pane fade show active" id="page1" role="tabpanel" aria-labelledby="page1-tab">
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="thead-dark sticky-header">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Alamat</th>
                                        <th>Kota</th>
                                        <th>Negara</th>
                                        <th>Kode Pos</th>
                                        <th>No. Telepon</th>
                                        <th>Faks</th>
                                        <th>Email Perusahaan</th>
                                        <th>Nama PIC</th>
                                        <th>Jabatan PIC</th>
                                        <th>No. Telepon PIC</th>
                                        <th>No. HP PIC</th>
                                        <th>Email PIC</th>
                                        <th>Nama CP</th>
                                        <th>Jabatan CP</th>
                                        <th>No. Telepon CP</th>
                                        <th>No. HP CP</th>
                                        <th>Email CP</th>
                                        <th>Jenis Registrasi</th>
                                        <th>Jenis Aplikasi</th>
                                        <th>Status Registrasi</th>
                                        <th>Jenis Produk</th>
                                        <th>Jenis Pemasaran Produk</th>
                                        <th>Jumlah Karyawan</th>
                                        <th>Kapasitas Produksi</th>
                                        <th>No. NPWP</th>
                                        <th>Nama Fasilitas Produksi</th>
                                        <th>Alamat Fasilitas Produksi</th>
                                        <th>Kota Fasilitas</th>
                                        <th>Negara Fasilitas</th>
                                        <th>Kode Pos Fasilitas</th>
                                        <th>No. Telepon Fasilitas</th>
                                        <th>Faks Fasilitas</th>
                                        <th>Email Fasilitas</th>
                                        <th>Nama PIC Fasilitas</th>
                                        <th>Jabatan PIC Fasilitas</th>
                                        <th>No. Telepon PIC Fasilitas</th>
                                        <th>No. HP PIC Fasilitas</th>
                                        <th>Email PIC Fasilitas</th>
                                        <th>Nama CP Fasilitas</th>
                                        <th>Jabatan CP Fasilitas</th>
                                        <th>No. Telepon CP Fasilitas</th>
                                        <th>No. HP CP Fasilitas</th>
                                        <th>Email CP Fasilitas</th>
                                        <th>Nama dan Alamat Fasilitas Lainnya</th>
                                        <th>Status</th>
                                        <th>Dibuat Pada</th>
                                        <th>Diperbarui Pada</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($dataCerti && $dataCerti->count())
                                        @foreach ($dataCerti as $company)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $company->company_name ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->address ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->city ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->country ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->zip_code ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->phone ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->fax ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->company_email ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->pic_name ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->pic_title ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->pic_phone ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->pic_mobile_phone ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->pic_email ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->cp_name ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->cp_title ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->cp_phone ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->cp_mobile_phone ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->cp_email ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->registration_type ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->application_type ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->registration_status ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->product_type ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->product_marketing_type ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->total_employee ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->production_capacity ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->npwp_number ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->facility_manufacturer_name ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->facility_manufacturer_address ?? 'tidak di pilih' }}
                                                </td>
                                                <td>{{ $company->facility_city ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->facility_country ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->facility_zip_code ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->facility_phone ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->facility_fax ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->facility_email ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->facility_pic_name ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->facility_pic_title ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->facility_pic_phone ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->facility_pic_mobile_phone ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->facility_pic_email ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->facility_cp_name ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->facility_cp_title ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->facility_cp_phone ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->facility_cp_mobile_phone ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->facility_cp_email ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->other_facility_name_and_address ?? 'tidak di pilih' }}
                                                </td>
                                                <td>{{ $company->status ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->created_at ?? 'tidak di pilih' }}</td>
                                                <td>{{ $company->updated_at ?? 'tidak di pilih' }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="42" class="text-center">Tidak ada data Certifikat yang kamu
                                                ajukan.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <!-- CSS -->


                    </div>
                </div>

                <!-- Page 2 -->
                <div class="tab-pane fade" id="page2" role="tabpanel" aria-labelledby="page2-tab">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="table">
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No. Telepon</th>
                                    <th>Alamat KTP</th>
                                    <th>NPWP Pribadi</th>
                                    <th>Keputusan Impor Perusahaan</th>
                                    <th>BPJS Ketenagakerjaan</th>
                                    <th>BPJS Kesehatan</th>
                                    <th>Perbedaan NPWP</th>
                                    <th>Nama Usaha</th>
                                    <th>KBLI</th>
                                    <th>Skala Usaha</th>
                                    <th>Alamat Usaha</th>
                                    <th>Provinsi</th>
                                    <th>Kabupaten/Kota</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>Kode Pos</th>
                                    <th>Modal Usaha</th>
                                    <th>Deskripsi Usaha</th>
                                    <th>Jumlah Pekerja Lokal</th>
                                    <th>Status Usaha</th>
                                    <th>Rencana Bangunan Baru</th>
                                    <th>Jenis Usaha</th>
                                    <th>Lokasi Usaha Darat</th>
                                    <th>Luas yang Dibutuhkan</th>
                                    <th>Panjang yang Dibutuhkan</th>
                                    <th>Kedalaman Lokasi</th>
                                    <th>Luas Rencana Bangunan</th>
                                    <th>Kesesuaian Tata Ruang</th>
                                    <th>Reklamasi</th>
                                    <th>Nama Perairan</th>
                                    <th>Lokasi Lintas Provinsi</th>
                                    <th>Koordinat</th>
                                    <th>Luas Tanah Usaha</th>
                                    <th>Status Persetujuan Hutan</th>
                                    <th>Jenis Izin Hutan yang Dibutuhkan</th>
                                    <th>Status</th>
                                    <th>Dibuat Pada</th>
                                    <th>Diperbarui Pada</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($dataNib && $dataNib->count())
                                    @foreach ($dataNib as $business)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $business->nik ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->name ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->gender ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->phone ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->id_card_address ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->personal_npwp ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->company_import_decision ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->has_bpjs_employment ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->has_bpjs_health ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->is_npwp_different ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->business_name ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->kbli ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->business_scala ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->business_address ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->province ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->regency ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->subdistrict ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->ward ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->pos_code ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->business_capital ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->business_description ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->indonesian_workers ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->business_status ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->new_building_plan ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->business_type ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->land_based_business_location ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->required_area ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->required_length ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->location_depth ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->building_plan_area ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->spatial_compatibility ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->reclamation ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->water_name ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->cross_province_location ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->coordinates ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->business_land_area ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->forest_approval_status ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->required_forest_permit_type ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->status ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->created_at ?? 'Tidak di Pilih' }}</td>
                                            <td>{{ $business->updated_at ?? 'Tidak di Pilih' }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="42" class="text-center">Tidak ada data Certifikat yang kamu
                                            ajukan.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Page 3 -->
                <div class="tab-pane fade" id="page3" role="tabpanel" aria-labelledby="page3-tab">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Company</th>
                                <th>Schedule</th>
                                <th>Food</th>
                                <th>Drink</th>
                                <th>Fruit</th>
                                <th>Snack</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example Row of Data -->
                            <tr>
                                @foreach ($dataFood as $item)
                                    <td>{{ $i++ }}</td>
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

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
