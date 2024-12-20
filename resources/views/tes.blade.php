<div class="mb-4">
    <label for="nik" class="form-label">NIK</label>
    <input type="number" class="form-control" name="nik" id="nik" required>
</div>

<div class="mb-4">
    <label for="name" class="form-label">Nama</label>
    <input type="text" class="form-control" name="name" id="name" required>
</div>

<div class="mb-4">
    <label for="gender" class="form-label">Jenis Kelamin</label>
    <select class="form-select" id="gender" name="gender"
        aria-label="Default select example">
        <option value="">Open this select menu</option>
        <option value="male">Laki-Laki</option>
        <option value="female">Perempuan</option>
    </select>
</div>

<div class="mb-4">
    <label for="phone" class="form-label">Nomor Telepon</label>
    <input type="number" class="form-control" name="phone" id="phone" required>
</div>

<div class="mb-4">
    <label for="id_card_address" class="form-label">Alamat KTP</label>
    <input type="text" class="form-control" name="id_card_address"
        id="id_card_address" required>
</div>

<div class="mb-4">
    <label for="personal_npwp" class="form-label">NPWP Pribadi</label>
    <input type="text" class="form-control" name="personal_npwp" id="personal_npwp"
        required>
</div>

<div class="mb-4">
    <label for="company_import_decision" class="form-label">Apakah perusahaan Anda akan
        melakukan impor barang sendiri?</label>
    <select class="form-select" id="company_import_decision"
        name="company_import_decision" aria-label="Default select example">
        <option selected>Open this select menu</option>
        <option value="yes">Iya</option>
        <option value="no">Tidak</option>
    </select>
</div>

<div class="mb-4">
    <label for="has_bpjs_employment" class="form-label">Apakah Anda sudah memiliki BPJS
        Ketenagakerjaan?</label>
    <select class="form-select" id="has_bpjs_employment" name="has_bpjs_employment"
        aria-label="Default select example">
        <option selected>Open this select menu</option>
        <option value="yes">Iya</option>
        <option value="no">Tidak</option>
    </select>
</div>

<div class="mb-4">
    <label for="has_bpjs_health" class="form-label">Apakah Anda sudah memiliki BPJS
        Kesehatan?</label>
    <select class="form-select" id="has_bpjs_health" name="has_bpjs_health"
        aria-label="Default select example">
        <option selected>Open this select menu</option>
        <option value="yes">Iya</option>
        <option value="no">Tidak</option>
    </select>
</div>

<!-- Radio Button Pilihan Usaha -->
<div class="mb-3">
    <label class="form-label">Jenis Usaha</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="usaha" id="usahaDarat"
            value="darat">
        <label class="form-check-label" for="usahaDarat">
            Usaha Darat
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="usaha" id="usahaLaut"
            value="laut">
        <label class="form-check-label" for="usahaLaut">
            Usaha Laut
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="usaha"
            id="usahaHutan" value="hutan">
        <label class="form-check-label" for="usahaHutan">
            Usaha Hutan
        </label>
    </div>
</div>

<!-- Input untuk Usaha Darat -->
<div id="daratSection" class="form-section">
    <div class="mb-4">
        <label for="is_npwp_different" class="form-label">Apakah anda
            memiliki
            NPWP
            berbeda/cabang di lokasi ini?</label>
        <select class="form-select" id="is_npwp_different" name="is_npwp_different"
            aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="yes">Iya</option>
            <option value="no">Tidak</option>
        </select>
    </div>
    <div class="mb-4">
        <label for="business_name" class="form-label">Nama
            Usaha/Kegiatan</label>
        <input type="text" class="form-control" id="business_name"
            name="business_name">
    </div>
    <div class="mb-4">
        <label for="land_based_business_location" class="form-label">Luas Lahan
            Usaha</label>
        <input type="number" class="form-control" id="land_based_business_location"
            name="land_based_business_location" placeholder="Satuan M²">
    </div>
    <div class="mb-4">
        <label for="kbli" class="form-label">KBLI (Klasifikasi Baku Lapangan
            Usaha)</label>
        <input type="text" class="form-control" id="kbli" name="kbli"
            required>
    </div>
    <div class="mb-4">
        <label for="business_scala" class="form-label">Skala Usaha</label>
        <select class="form-select" id="business_scala" name="business_scala"
            required>
            <option value="UMKM">UMKM</option>
            <option value="Non-UMKM">Non-UMKM</option>
        </select>
    </div>
    <div class="mb-4">
        <label for="business_address" class="form-label">Alamat Usaha</label>
        <input type="text" class="form-control" id="business_address"
            name="business_address">
    </div>
    <div class="mb-4">
        <label for="province" class="form-label">Provinsi</label>
        <input type="text" class="form-control" id="province" name="province">
    </div>
    <div class="mb-4">
        <label for="regency" class="form-label">Kabupaten / Kota</label>
        <input type="text" class="form-control" id="regency" name="regency">
    </div>
    <div class="mb-4">
        <label for="subdistrict" class="form-label">Kecamatan</label>
        <input type="text" class="form-control" id="subdistrict"
            name="subdistrict">
    </div>
    <div class="mb-4">
        <label for="ward" class="form-label">Kelurahan / Desa</label>
        <input type="text" class="form-control" id="ward" name="ward">
    </div>
    <div class="mb-4">
        <label for="pos_code" class="form-label">Kode Pos</label>
        <input type="number" class="form-control" id="pos_code" name="pos_code">
    </div>
    <div class="mb-4">
        <label for="business_scale" class="form-label">Apakah kegiatan usaha sudah
            berjalan</label>
        <select class="form-select" id="business_scale" name="business_scale"
            required>
            <option value="">Open this select menu</option>
            <option value="already">Sudah</option>
            <option value="not yet">Belum</option>
        </select>
    </div>
    <div class="mb-4">
        <label for="new_building_plan" class="form-label">Apakah Anda akan melakukan
            pembangunan Gedung?</label>
        <select class="form-select" id="new_building_plan" name="new_building_plan"
            required>
            <option selected>Open this select menu</option>
            <option value="yes">Ya</option>
            <option value="no">Tidak</option>
        </select>
    </div>
    <div class="mb-4">
        <label for="business_capital" class="form-label">Modal Usaha</label>
        <input type="number" class="form-control" id="business_capital"
            name="business_capital">
    </div>
    <div class="mb-4">
        <label for="business_description" class="form-label">Deskripsi Kegiatan
            Usaha</label>
        <input type="text" class="form-control" id="business_description"
            name="business_description">
    </div>
    <div class="mb-4">
        <label for="indonesian_workers" class="form-label">Jumlah Tenaga Kerja
            Indonesia</label>
        <input type="number" class="form-control" id="indonesian_workers"
            name="indonesian_workers">
    </div>
</div>

<!-- Input untuk Usaha Laut -->
<div id="lautSection" class="form-section">
    <div class="mb-4">
        <label for="is_npwp_different" class="form-label">Apakah anda
            memiliki
            NPWP
            berbeda/cabang di lokasi ini?</label>
        <select class="form-select" id="is_npwp_different" name="is_npwp_different"
            aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="yes">Iya</option>
            <option value="no">Tidak</option>
        </select>
    </div>
    <div class="mb-4">
        <label for="business_name" class="form-label">Nama
            Usaha/Kegiatan</label>
        <input type="text" class="form-control" id="business_name"
            name="business_name">
    </div>
    <div class="mb-4">
        <label for="spatial_compatibility" class="form-label">Apakah atas lokasi dan
            kegiatan yang diajukan telah memiliki kesesuaian kegiatan pemanfaatan
            ruang?</label>
        <select class="form-select" id="spatial_compatibility"
            name="spatial_compatibility" required>
            <option selected>Open this select menu</option>
            <option value="yes">Ya</option>
            <option value="no">Tidak</option>
        </select>
    </div>
    <div class="mb-4">
        <label for="required_area" class="form-label">Luas Yang di Perlukan</label>
        <input type="number" class="form-control" id="required_area"
            name="required_area" placeholder="Satuan M²">
    </div>
    <div class="mb-4">
        <label for="required_length" class="form-label">Panjang Yang di
            Perlukan</label>
        <input type="number" class="form-control" id="required_length"
            name="required_length" placeholder="Satuan M">
    </div>
    <div class="mb-4">
        <label for="location_depth" class="form-label">Kedalaman Lokasi</label>
        <input type="number" class="form-control" id="location_depth"
            name="location_depth" placeholder="Satuan M">
    </div>
    <div class="mb-4">
        <label for="building_plan_area" class="form-label">Rencana Luas
            Bangunan</label>
        <input type="number" class="form-control" id="building_plan_area"
            name="building_plan_area" placeholder="Satuan M²">
    </div>
    <div class="mb-4">
        <label for="reclamation" class="form-label">Apakah Perusahaan Melakukan
            Reklamasi?</label>
        <select class="form-select" id="reclamation" name="reclamation" required>
            <option selected>Open this select menu</option>
            <option value="yes">Ya</option>
            <option value="no">Tidak</option>
        </select>
    </div>
    <div class="mb-4">
        <label for="water_name" class="form-label">Nama Perairan</label>
        <input type="text" class="form-control" id="water_name" name="water_name"
            placeholder="Contoh: Laut Jawa / Laut Banda">
    </div>
    <div class="mb-4">
        <label for="province" class="form-label">Provinsi</label>
        <input type="text" class="form-control" id="province" name="province">
    </div>
    <div class="mb-4">
        <label for="coordinates" class="form-label">Koordinat</label>
        <input type="file" class="form-control" id="coordinates"
            name="coordinates">
    </div>
    <div class="mb-4">
        <label for="cross_province_location" class="form-label">Apakah Lokasi Lintas
            Provinsi?</label>
        <select class="form-select" id="cross_province_location"
            name="cross_province_location" required>
            <option selected>Open this select menu</option>
            <option value="yes">Ya</option>
            <option value="no">Tidak</option>
        </select>
    </div>
    <div class="mb-4">
        <label for="business_status" class="form-label">Apakah kegiatan usaha ini
            sudah berjalan?</label>
        <select class="form-select" id="business_status" name="business_status"
            required>
            <option value="">Open this select menu</option>
            <option value="sudah">Sudah</option>
            <option value="belum">Belum</option>
        </select>
    </div>
    <div class="mb-4">
        <label for="new_building_plan" class="form-label">Apakah Anda akan melakukan
            pembangunan gedung?</label>
        <select class="form-select" id="new_building_plan" name="new_building_plan"
            required>
            <option value="">Open this select menu</option>
            <option value="yes">Ya</option>
            <option value="no">Tidak</option>
        </select>
    </div>
    <div class="mb-4">
        <label for="business_capital" class="form-label">Modal Usaha</label>
        <input type="number" class="form-control" id="business_capital"
            name="business_capital">
    </div>
    <div class="mb-4">
        <label for="business_description" class="form-label">Deskripsi Kegiatan
            Usaha</label>
        <input type="text" class="form-control" id="business_description"
            name="business_description">
    </div>
    <div class="mb-4">
        <label for="indonesian_workers" class="form-label">Jumlah Tenaga Kerja
            Indonesia</label>
        <input type="number" class="form-control" id="indonesian_workers"
            name="indonesian_workers">
    </div>
</div>

<!-- Input untuk Usaha Hutan -->
<div class="form-section" id="hutanSection">
    <div class="mb-4">
        <label for="is_npwp_different" class="form-label">Apakah anda
            memiliki
            NPWP
            berbeda/cabang di lokasi ini?</label>
        <select class="form-select" id="is_npwp_different" name="is_npwp_different"
            aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="yes">Iya</option>
            <option value="no">Tidak</option>
        </select>
    </div>
    <div class="mb-4">
        <label for="business_name" class="form-label">Nama
            Usaha/Kegiatan</label>
        <input type="text" class="form-control" id="business_name"
            name="business_name">
    </div>
    <div class="mb-4">
        <label for="forest_approval_status" class="form-label">Apakah sudah memiliki
            IPPKH/Persetujuan Pelepasan Kawasan Hutan/Pemanfaatan Hutan/Konservasi
            Kawasan/Analisis Status Fungsi sebelumnya?</label>
        <select class="form-select" id="forest_approval_status"
            name="forest_approval_status" required>
            <option selected>Open this select menu</option>
            <option value="sudah">Sudah</option>
            <option value="belum">Belum</option>
        </select>
    </div>
    <div class="mb-4">
        <label for="required_forest_permit_type" class="form-label">Jenis Perizinan
            Lokasi Hutan yang Dibutuhkan</label>
        <select class="form-select" id="required_forest_permit_type"
            name="required_forest_permit_type" required>
            <option selected>Open this select menu</option>
            <option value="use_forest">Penggunaan Kawasan Hutan</option>
            <option value="release_forest">Pelepasan Kawasan Hutan</option>
            <option value="forest_utilization">Pemanfaatan Hutan</option>
            <option value="forest_conversion">Konversi Kawasan</option>
        </select>
    </div>
    <div class="mb-4">
        <label for="business_land_area" class="form-label">Luas Lahan Usaha</label>
        <input type="number" class="form-control" id="business_land_area"
            name="business_land_area" placeholder="Satuan M²">
    </div>
    <div class="mb-4">
        <label for="business_address" class="form-label">Alamat Usaha</label>
        <input type="text" class="form-control" id="business_address"
            name="business_address">
    </div>
    <div class="mb-4">
        <label for="province" class="form-label">Provinsi</label>
        <input type="text" class="form-control" id="province" name="province">
    </div>
    <div class="mb-4">
        <label for="regency" class="form-label">Kabupaten / Kota</label>
        <input type="text" class="form-control" id="regency" name="regency">
    </div>
    <div class="mb-4">
        <label for="subdistrict" class="form-label">Kecamatan</label>
        <input type="text" class="form-control" id="subdistrict"
            name="subdistrict">
    </div>
    <div class="mb-4">
        <label for="ward" class="form-label">Kelurahan / Desa</label>
        <input type="text" class="form-control" id="ward" name="ward">
    </div>
    <div class="mb-4">
        <label for="pos_code" class="form-label">Kode Pos</label>
        <input type="number" class="form-control" id="pos_code" name="pos_code">
    </div>
    <div class="mb-4">
        <label for="business_status" class="form-label">Apakah kegiatan usaha ini
            sudah berjalan?</label>
        <select class="form-select" id="business_status" name="business_status"
            required>
            <option value="">Open this select menu</option>
            <option value="sudah">Sudah</option>
            <option value="belum">Belum</option>
        </select>
    </div>
    <div class="mb-4">
        <label for="new_building_plan" class="form-label">Apakah Anda akan melakukan
            pembangunan gedung?</label>
        <select class="form-select" id="new_building_plan" name="new_building_plan"
            required>
            <option value="">Open this select menu</option>
            <option value="yes">Ya</option>
            <option value="no">Tidak</option>
        </select>
    </div>
    <div class="mb-4">
        <label for="business_capital" class="form-label">Modal Usaha</label>
        <input type="number" class="form-control" id="business_capital"
            name="business_capital">
    </div>
    <div class="mb-4">
        <label for="business_description" class="form-label">Deskripsi Kegiatan
            Usaha</label>
        <input type="text" class="form-control" id="business_description"
            name="business_description">
    </div>
    <div class="mb-4">
        <label for="indonesian_workers" class="form-label">Jumlah Tenaga Kerja
            Indonesia</label>
        <input type="number" class="form-control" id="indonesian_workers"
            name="indonesian_workers">
    </div>
</div>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Form Input Usaha</title>
    <style>
        
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Form Input Usaha</h2>
    
</div>

<script>
    
</script>
</body>
</html>