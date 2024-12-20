<?php

namespace App\Http\Controllers;

use App\Models\Nib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class NibController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Auth::user(); // contoh mengambil data pengguna
        return view('service.dokumen', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $user = Auth::user();

        $request->validate([
            'nik' => 'required|integer',
            'name' => 'required|string|max:255',
            'gender' => 'required|string|in:male,female', // Ubah sesuai dengan opsi gender yang valid
            'phone' => 'required|string|digits_between:10,15',
            'id_card_address' => 'required|string|max:500',
            'personal_npwp' => 'nullable|string|max:50',
            'company_import_decision' => 'nullable|string|max:255',
            'has_bpjs_employment' => 'required',
            'has_bpjs_health' => 'required',
            'is_npwp_different' => 'required',
            'business_name' => 'required|string|max:255',
            'kbli' => 'nullable|string|max:20',
            'business_scala' => 'required|string|max:100',
            'business_address' => 'required|string|max:500',
            'province' => 'required|string|max:100',
            'regency' => 'required|string|max:100',
            'subdistrict' => 'required|string|max:100',
            'ward' => 'required|string|max:100',
            'pos_code' => 'required|string|size:5', // Pos kode Indonesia biasanya 5 digit
            'business_capital' => 'required|numeric|min:0',
            'business_description' => 'required|string',
            'indonesian_workers' => 'required|integer|min:0',
            'business_status' => 'required|in:sudah,belum',
            'new_building_plan' => 'required|in:yes,no',
            'business_type' => 'required|in:darat,laut,hutan',

            // Kolom untuk Bisnis Darat
            'land_based_business_location' => 'nullable|string|max:255',

            // Kolom untuk Bisnis Laut
            'required_area' => 'nullable|numeric|min:0',
            'required_length' => 'nullable|numeric|min:0',
            'location_depth' => 'nullable|numeric|min:0',
            'building_plan_area' => 'nullable|numeric|min:0',
            'spatial_compatibility' => 'nullable|in:yes,no',
            'reclamation' => 'nullable|in:yes,no',
            'water_name' => 'nullable|string|max:255',
            'cross_province_location' => 'nullable|string|max:255',

            // Kolom untuk Bisnis Hutan
            'business_land_area' => 'nullable|string|max:255',
            'forest_approval_status' => 'nullable|in:sudah,belum',
            'required_forest_permit_type' => 'nullable|in:Penggunaan Kawasan Hutan,Pelepasan Kawasan Hutan,Pemanfaatan Hutan,Konversi Kawasan',
        ], [
            'nik.required' => 'NIK harus diisi.',
            'nik.integer' => 'NIK harus berupa angka.',

            'name.required' => 'Nama harus diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama maksimal :max karakter.',

            'gender.required' => 'Jenis kelamin harus diisi.',
            'gender.string' => 'Jenis kelamin harus berupa teks.',
            'gender.in' => 'Jenis kelamin tidak valid.',

            'phone.required' => 'Nomor telepon harus diisi.',
            'phone.regex' => 'Nomor telepon tidak valid. Harus mengikuti format Indonesia.',

            'id_card_address.required' => 'Alamat KTP harus diisi.',
            'id_card_address.string' => 'Alamat KTP harus berupa teks.',
            'id_card_address.max' => 'Alamat KTP maksimal :max karakter.',

            'personal_npwp.string' => 'NPWP harus berupa teks.',
            'personal_npwp.max' => 'NPWP maksimal :max karakter.',

            'company_import_decision.string' => 'Keputusan impor perusahaan harus berupa teks.',
            'company_import_decision.max' => 'Keputusan impor perusahaan maksimal :max karakter.',

            'has_bpjs_employment.required' => 'Status BPJS Ketenagakerjaan harus diisi.',
            'has_bpjs_employment.boolean' => 'Status BPJS Ketenagakerjaan tidak valid.',

            'has_bpjs_health.required' => 'Status BPJS Kesehatan harus diisi.',
            'has_bpjs_health.boolean' => 'Status BPJS Kesehatan tidak valid.',

            'is_npwp_different.required' => 'Status NPWP berbeda harus diisi.',
            'is_npwp_different.boolean' => 'Status NPWP berbeda tidak valid.',

            'business_name.required' => 'Nama bisnis harus diisi.',
            'business_name.string' => 'Nama bisnis harus berupa teks.',
            'business_name.max' => 'Nama bisnis maksimal :max karakter.',

            'kbli.string' => 'Kbli harus berupa teks.',
            'kbli.max' => 'Kbli maksimal :max karakter.',

            'business_scala.required' => 'Skala bisnis harus diisi.',
            'business_scala.string' => 'Skala bisnis harus berupa teks.',
            'business_scala.max' => 'Skala bisnis maksimal :max karakter.',

            'business_address.required' => 'Alamat bisnis harus diisi.',
            'business_address.string' => 'Alamat bisnis harus berupa teks.',
            'business_address.max' => 'Alamat bisnis maksimal :max karakter.',

            'province.required' => 'Provinsi harus diisi.',
            'province.string' => 'Provinsi harus berupa teks.',
            'province.max' => 'Provinsi maksimal :max karakter.',

            'regency.required' => 'Kota/Kabupaten harus diisi.',
            'regency.string' => 'Kota/Kabupaten harus berupa teks.',
            'regency.max' => 'Kota/Kabupaten maksimal :max karakter.',

            'subdistrict.required' => 'Kecamatan harus diisi.',
            'subdistrict.string' => 'Kecamatan harus berupa teks.',
            'subdistrict.max' => 'Kecamatan maksimal :max karakter.',

            'ward.required' => 'Kelurahan harus diisi.',
            'ward.string' => 'Kelurahan harus berupa teks.',
            'ward.max' => 'Kelurahan maksimal :max karakter.',

            'pos_code.required' => 'Kode pos harus diisi.',
            'pos_code.string' => 'Kode pos harus berupa teks.',
            'pos_code.size' => 'Kode pos harus terdiri dari :size digit.',

            'business_capital.required' => 'Modal usaha harus diisi.',
            'business_capital.numeric' => 'Modal usaha harus berupa angka.',
            'business_capital.min' => 'Modal usaha tidak boleh negatif.',

            'business_description.required' => 'Deskripsi bisnis harus diisi.',
            'business_description.string' => 'Deskripsi bisnis harus berupa teks.',

            'indonesian_workers.required' => 'Jumlah pekerja Indonesia harus diisi.',
            'indonesian_workers.integer' => 'Jumlah pekerja Indonesia harus berupa angka.',
            'indonesian_workers.min' => 'Jumlah pekerja Indonesia tidak boleh negatif.',

            'business_status.required' => 'Status bisnis harus diisi.',
            'business_status.in' => 'Status bisnis tidak valid.',

            'new_building_plan.required' => 'Rencana pembangunan baru harus diisi.',
            'new_building_plan.in' => 'Rencana pembangunan baru tidak valid.',

            'business_type.required' => 'Tipe bisnis harus diisi.',
            'business_type.in' => 'Tipe bisnis tidak valid.',

            // Kolom untuk Bisnis Darat
            'land_based_business_location.string' => 'Lokasi bisnis darat harus berupa teks.',
            'land_based_business_location.max' => 'Lokasi bisnis darat maksimal :max karakter.',

            // Kolom untuk Bisnis Laut
            'required_area.numeric' => 'Luas yang dibutuhkan harus berupa angka.',
            'required_area.min' => 'Luas yang dibutuhkan tidak boleh negatif.',

            'required_length.numeric' => 'Panjang yang dibutuhkan harus berupa angka.',
            'required_length.min' => 'Panjang yang dibutuhkan tidak boleh negatif.',

            'location_depth.numeric' => 'Kedalaman lokasi harus berupa angka.',
            'location_depth.min' => 'Kedalaman lokasi tidak boleh negatif.',

            'building_plan_area.numeric' => 'Luas rencana pembangunan harus berupa angka.',
            'building_plan_area.min' => 'Luas rencana pembangunan tidak boleh negatif.',

            'spatial_compatibility.in' => 'Keselarasan ruang tidak valid.',

            'reclamation.in' => 'Reklamasi tidak valid.',

            'water_name.string' => 'Nama air harus berupa teks.',
            'water_name.max' => 'Nama air maksimal :max karakter.',

            'cross_province_location.string' => 'Lokasi lintas provinsi harus berupa teks.',
            'cross_province_location.max' => 'Lokasi lintas provinsi maksimal :max karakter.',

            // Kolom untuk Bisnis Hutan
            'business_land_area.string' => 'Luas lahan bisnis harus berupa teks.',
            'business_land_area.max' => 'Luas lahan bisnis maksimal :max karakter.',

            'forest_approval_status.in' => 'Status persetujuan hutan tidak valid.',

            'required_forest_permit_type.in' => 'Tipe izin hutan yang dibutuhkan tidak valid.',
        ]);


        $data = [
            'user_id' => $user->id,
            'nik' => $request->nik,
            'name' => $request->name,
            'gender' => $request->gender, // Sesuaikan pilihan gender jika perlu
            'phone' => $request->phone,
            'id_card_address' => $request->id_card_address,
            'personal_npwp' => $request->personal_npwp,
            'company_import_decision' => $request->company_import_decision,
            'has_bpjs_employment' => $request->has_bpjs_employment, // Sesuaikan nilai valid
            'has_bpjs_health' => $request->has_bpjs_health,
            'is_npwp_different' => $request->is_npwp_different,
            'business_name' => $request->business_name,
            'kbli' => $request->kbli, // Sesuaikan jika ada format khusus
            'business_scala' => $request->business_scala,
            'business_address' => $request->business_address,
            'province' => $request->province,
            'regency' => $request->regency,
            'subdistrict' => $request->subdistrict,
            'ward' => $request->ward,
            'pos_code' => $request->pos_code, // Pos kode Indonesia biasanya 5 digit
            'business_capital' => $request->business_capital, // Maksimum esuai kebutuhan
            'business_description' => $request->business_description,
            'indonesian_workers' => $request->indonesian_workers,
            'business_status' => $request->business_status,
            'new_building_plan' => $request->new_building_plan,
            'business_type' => $request->business_type,

            'land_based_business_location' => $request->land_based_business_location,

            'required_area' => $request->required_are,
            'required_length' => $request->required_length,
            'location_depth' => $request->location_depth,
            'building_plan_area' => $request->building_plan_area,
            'spatial_compatibility' => $request->spatial_compatibility,
            'reclamation' => $request->reclamation,
            'water_name' => $request->water_name,
            'cross_province_location' => $request->cross_province_location,

            'business_land_area' => $request->business_land_area,
            'forest_approval_status' => $request->forest_approval_status,
            'required_forest_permit_type' => $request->required_forest_permit_type,
        ];

        Nib::create($data);
        return redirect('/dashboard')->with('success', 'Successfully Created Data Nib');
    }

    public function exportNib()
    {
        ob_end_clean();
        $nibs = Nib::all();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No'); // Nomor
        $sheet->setCellValue('B1', 'NIK'); // Nomor Induk Kependudukan
        $sheet->setCellValue('C1', 'Nama'); // Nama
        $sheet->setCellValue('D1', 'Jenis Kelamin'); // Gender
        $sheet->setCellValue('E1', 'Nomor Telepon'); // Phone
        $sheet->setCellValue('F1', 'Alamat KTP'); // ID Card Address
        $sheet->setCellValue('G1', 'Nomor NPWP Pribadi'); // Personal NPWP
        $sheet->setCellValue('H1', 'Keputusan Impor Perusahaan'); // Company Import Decision
        $sheet->setCellValue('I1', 'BPJS Ketenagakerjaan'); // Has BPJS Employment
        $sheet->setCellValue('J1', 'BPJS Kesehatan'); // Has BPJS Health
        $sheet->setCellValue('K1', 'Apakah NPWP Berbeda?'); // Is NPWP Different
        $sheet->setCellValue('L1', 'Nama Bisnis'); // Business Name
        $sheet->setCellValue('M1', 'KBLI'); // KBLI
        $sheet->setCellValue('N1', 'Skala Bisnis'); // Business Scala
        $sheet->setCellValue('O1', 'Alamat Bisnis'); // Business Address
        $sheet->setCellValue('P1', 'Provinsi'); // Province
        $sheet->setCellValue('Q1', 'Kota/Kabupaten'); // Regency
        $sheet->setCellValue('R1', 'Kecamatan'); // Subdistrict
        $sheet->setCellValue('S1', 'Kelurahan'); // Ward
        $sheet->setCellValue('T1', 'Kode Pos'); // Pos Code
        $sheet->setCellValue('U1', 'Modal Bisnis'); // Business Capital
        $sheet->setCellValue('V1', 'Deskripsi Bisnis'); // Business Description
        $sheet->setCellValue('W1', 'Jumlah Pekerja Indonesia'); // Indonesian Workers
        $sheet->setCellValue('X1', 'Status Bisnis'); // Business Status
        $sheet->setCellValue('Y1', 'Rencana Bangunan Baru'); // New Building Plan
        $sheet->setCellValue('Z1', 'Tipe Bisnis'); // Business Type

        // Kolom untuk Bisnis Darat
        $sheet->setCellValue('AA1', 'Lokasi Bisnis Darat'); // Land Based Business Location

        // Kolom untuk Bisnis Laut
        $sheet->setCellValue('AB1', 'Area Diperlukan'); // Required Area
        $sheet->setCellValue('AC1', 'Panjang Diperlukan'); // Required Length
        $sheet->setCellValue('AD1', 'Kedalaman Lokasi'); // Location Depth
        $sheet->setCellValue('AE1', 'Area Rencana Bangunan'); // Building Plan Area
        $sheet->setCellValue('AF1', 'Kompatibilitas Ruang'); // Spatial Compatibility
        $sheet->setCellValue('AG1', 'Reklamasi'); // Reclamation
        $sheet->setCellValue('AH1', 'Nama Air'); // Water Name
        $sheet->setCellValue('AI1', 'Lokasi Lintas Provinsi'); // Cross Province Location
        $sheet->setCellValue('AJ1', 'Koordinat'); // Coordinates

        // Kolom untuk Bisnis Hutan
        $sheet->setCellValue('AK1', 'Luas Lahan Bisnis'); // Business Land Area
        $sheet->setCellValue('AL1', 'Status Persetujuan Hutan'); // Forest Approval Status
        $sheet->setCellValue('AM1', 'Jenis Izin Hutan Diperlukan'); // Required Forest Permit Type
        $sheet->setCellValue('AN1', 'Status'); // Status (Pending, Approved, Rejected)

        $row = 2;
        foreach ($nibs as $data) {
            $sheet->setCellValue('A' . $row, $row - 1); // Nomor
            $sheet->setCellValue('B' . $row, $data->nik);
            $sheet->setCellValue('C' . $row, $data->name);
            $sheet->setCellValue('D' . $row, $data->gender);
            $sheet->setCellValue('E' . $row, $data->phone);
            $sheet->setCellValue('F' . $row, $data->id_card_address);
            $sheet->setCellValue('G' . $row, $data->personal_npwp);
            $sheet->setCellValue('H' . $row, $data->company_import_decision);
            $sheet->setCellValue('I' . $row, $data->has_bpjs_employment);
            $sheet->setCellValue('J' . $row, $data->has_bpjs_health);
            $sheet->setCellValue('K' . $row, $data->is_npwp_different);
            $sheet->setCellValue('L' . $row, $data->business_name);
            $sheet->setCellValue('M' . $row, $data->kbli);
            $sheet->setCellValue('N' . $row, $data->business_scala);
            $sheet->setCellValue('O' . $row, $data->business_address);
            $sheet->setCellValue('P' . $row, $data->province);
            $sheet->setCellValue('Q' . $row, $data->regency);
            $sheet->setCellValue('R' . $row, $data->subdistrict);
            $sheet->setCellValue('S' . $row, $data->ward);
            $sheet->setCellValue('T' . $row, $data->pos_code);
            $sheet->setCellValue('U' . $row, $data->business_capital);
            $sheet->setCellValue('V' . $row, $data->business_description);
            $sheet->setCellValue('W' . $row, $data->indonesian_workers);
            $sheet->setCellValue('X' . $row, $data->business_status);
            $sheet->setCellValue('Y' . $row, $data->new_building_plan);
            $sheet->setCellValue('Z' . $row, $data->business_type);
            // Kolom untuk Bisnis Darat
            $sheet->setCellValue('AA' . $row, $data->land_based_business_location);
            // Kolom untuk Bisnis Laut
            $sheet->setCellValue('AB' . $row, $data->required_area);
            $sheet->setCellValue('AC' . $row, $data->required_length);
            $sheet->setCellValue('AD' . $row, $data->location_depth);
            $sheet->setCellValue('AE' . $row, $data->building_plan_area);
            $sheet->setCellValue('AF' . $row, $data->spatial_compatibility);
            $sheet->setCellValue('AG' . $row, $data->reclamation);
            $sheet->setCellValue('AH' . $row, $data->water_name);
            $sheet->setCellValue('AI' . $row, $data->cross_province_location);
            $sheet->setCellValue('AJ' . $row, $data->coordinates);
            // Kolom untuk Bisnis Hutan
            $sheet->setCellValue('AK' . $row, $data->business_land_area);
            $sheet->setCellValue('AL' . $row, $data->forest_approval_status);
            $sheet->setCellValue('AM' . $row, $data->required_forest_permit_type);
            $sheet->setCellValue('AN' . $row, $data->status);
    
            $row++; // Baris berikutnya
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'Nib.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {}
}
