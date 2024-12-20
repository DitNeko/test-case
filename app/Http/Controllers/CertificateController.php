<?php

namespace App\Http\Controllers;

use App\Models\certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CertificateController extends Controller
{
    public function index()
    {
        $user = Auth::User();

        $countries = countries();

        return view('service/pengajuan', compact('user'))->with('countries', $countries);
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
       

        $request->validate([
            'company_name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'zip_code' => 'required|string|max:20',
            'phone' => 'required|string|digits_between:10,15',
            'fax' => 'nullable|string|max:50',
            'company_email' => 'required|email|max:255',

            // PIC Information
            'pic_name' => 'required|string|max:255',
            'pic_title' => 'required|string|max:100',
            'pic_phone' => 'nullable|string|digits_between:10,15',
            'pic_mobile_phone' => 'nullable|regex:/^[0-9]{10,15}$/',
            'pic_email' => 'nullable|email|max:255',

            // CP Information
            'cp_name' => 'nullable|string|max:255',
            'cp_title' => 'nullable|string|max:100',
            'cp_phone' => 'nullable|string|digits_between:10,15',
            'cp_mobile_phone' => 'nullable|regex:/^[0-9]{10,15}$/',
            'cp_email' => 'nullable|email|max:255',

            // Other fields
            'registration_type' => 'required|string|max:100',
            'application_type' => 'required|string|max:100',
            'registration_status' => 'required|string|max:100',
            'product_type' => 'required|string|max:255',
            'product_marketing_type' => 'required|string|max:255',
            'total_employee' => 'required|integer|min:1',
            'production_capacity' => 'required|string|max:255',
            'npwp_number' => 'nullable|string|max:50',

            // Facility Data
            'facility_manufacturer_name' => 'nullable|string|max:255',
            'facility_manufacturer_address' => 'nullable|string|max:500',
            'facility_city' => 'nullable|string|max:100',
            'facility_country' => 'nullable|string|max:100',
            'facility_zip_code' => 'nullable|string|max:20',
            'facility_phone' => 'nullable|string|digits_between:10,15',
            'facility_fax' => 'nullable|string|max:50',
            'facility_email' => 'nullable|email|max:255',

            // PIC for Facility
            'facility_pic_name' => 'nullable|string|max:255',
            'facility_pic_title' => 'nullable|string|max:100',
            'facility_pic_phone' => 'nullable|string|digits_between:10,15',
            'facility_pic_mobile_phone' => 'nullable|regex:/^[0-9]{10,15}$/',
            'facility_pic_email' => 'nullable|email|max:255',

            // CP for Facility
            'facility_cp_name' => 'nullable|string|max:255',
            'facility_cp_title' => 'nullable|string|max:100',
            'facility_cp_phone' => 'nullable|string|digits_between:10,15',
            'facility_cp_mobile_phone' => 'nullable|regex:/^[0-9]{10,15}$/',
            'facility_cp_email' => 'nullable|email|max:255',

            // Other Facility
            'other_facility_name_and_address' => 'nullable|string|max:500',
        ], [
            'company_name.required' => 'Nama perusahaan wajib diisi.',
            'company_name.string' => 'Nama perusahaan harus berupa teks.',
            'company_name.max' => 'Nama perusahaan maksimal 255 karakter.',

            'address.required' => 'Alamat wajib diisi.',
            'address.string' => 'Alamat harus berupa teks.',
            'address.max' => 'Alamat maksimal 500 karakter.',

            'city.required' => 'Kota wajib diisi.',
            'city.string' => 'Kota harus berupa teks.',
            'city.max' => 'Kota maksimal 100 karakter.',

            'country.required' => 'Negara wajib diisi.',
            'country.string' => 'Negara harus berupa teks.',
            'country.max' => 'Negara maksimal 100 karakter.',

            'zip_code.required' => 'Kode pos wajib diisi.',
            'zip_code.string' => 'Kode pos harus berupa teks.',
            'zip_code.max' => 'Kode pos maksimal 20 karakter.',

            'phone.required' => 'Nomor telepon wajib diisi.',
            'phone.digits_between' => 'Nomor telepon harus terdiri dari 10 hingga 15 digit.',

            'fax.max' => 'Nomor fax maksimal 50 karakter.',

            'company_email.required' => 'Email perusahaan wajib diisi.',
            'company_email.email' => 'Email perusahaan harus dalam format yang valid.',
            'company_email.max' => 'Email perusahaan maksimal 255 karakter.',

            // PIC Information
            'pic_name.required' => 'Nama PIC wajib diisi.',
            'pic_name.string' => 'Nama PIC harus berupa teks.',
            'pic_name.max' => 'Nama PIC maksimal 255 karakter.',

            'pic_title.max' => 'Jabatan PIC maksimal 100 karakter.',

            'pic_phone.digits_between' => 'Nomor telepon PIC harus terdiri dari 10 hingga 15 digit.',

            'pic_mobile_phone.regex' => 'Nomor ponsel PIC tidak valid.',

            'pic_email.email' => 'Email PIC harus dalam format yang valid.',
            'pic_email.max' => 'Email PIC maksimal 255 karakter.',

            // CP Information
            'cp_name.string' => 'Nama CP harus berupa teks.',
            'cp_name.max' => 'Nama CP maksimal 255 karakter.',

            'cp_title.max' => 'Jabatan CP maksimal 100 karakter.',

            'cp_phone.digits_between' => 'Nomor telepon CP harus terdiri dari 10 hingga 15 digit.',

            'cp_mobile_phone.regex' => 'Nomor ponsel CP tidak valid.',

            'cp_email.email' => 'Email CP harus dalam format yang valid.',
            'cp_email.max' => 'Email CP maksimal 255 karakter.',

            // Other fields
            'registration_type.required' => 'Tipe registrasi wajib diisi.',
            'registration_type.string' => 'Tipe registrasi harus berupa teks.',
            'registration_type.max' => 'Tipe registrasi maksimal 100 karakter.',

            'application_type.required' => 'Tipe aplikasi wajib diisi.',
            'application_type.string' => 'Tipe aplikasi harus berupa teks.',
            'application_type.max' => 'Tipe aplikasi maksimal 100 karakter.',

            'registration_status.required' => 'Status registrasi wajib diisi.',
            'registration_status.string' => 'Status registrasi harus berupa teks.',
            'registration_status.max' => 'Status registrasi maksimal 100 karakter.',

            'product_type.required' => 'Tipe produk wajib diisi.',
            'product_type.string' => 'Tipe produk harus berupa teks.',
            'product_type.max' => 'Tipe produk maksimal 255 karakter.',

            'product_marketing_type.required' => 'Tipe pemasaran produk wajib diisi.',
            'product_marketing_type.string' => 'Tipe pemasaran produk harus berupa teks.',
            'product_marketing_type.max' => 'Tipe pemasaran produk maksimal 255 karakter.',

            'total_employee.required' => 'Total karyawan wajib diisi.',
            'total_employee.integer' => 'Total karyawan harus berupa angka.',
            'total_employee.min' => 'Total karyawan minimal 1.',

            'production_capacity.required' => 'Kapasitas produksi wajib diisi.',
            'production_capacity.string' => 'Kapasitas produksi harus berupa teks.',
            'production_capacity.max' => 'Kapasitas produksi maksimal 255 karakter.',

            'npwp_number.max' => 'Nomor NPWP maksimal 50 karakter.',

            // Facility Data
            'facility_manufacturer_name.string' => 'Nama pabrik harus berupa teks.',
            'facility_manufacturer_name.max' => 'Nama pabrik maksimal 255 karakter.',

            'facility_manufacturer_address.string' => 'Alamat pabrik harus berupa teks.',
            'facility_manufacturer_address.max' => 'Alamat pabrik maksimal 500 karakter.',

            'facility_city.string' => 'Kota pabrik harus berupa teks.',
            'facility_city.max' => 'Kota pabrik maksimal 100 karakter.',

            'facility_country.string' => 'Negara pabrik harus berupa teks.',
            'facility_country.max' => 'Negara pabrik maksimal 100 karakter.',

            'facility_zip_code.string' => 'Kode pos pabrik harus berupa teks.',
            'facility_zip_code.max' => 'Kode pos pabrik maksimal 20 karakter.',

            'facility_phone.digits_between' => 'Nomor telepon pabrik harus terdiri dari 10 hingga 15 digit.',

            'facility_fax.max' => 'Nomor fax pabrik maksimal 50 karakter.',

            'facility_email.email' => 'Email pabrik harus dalam format yang valid.',
            'facility_email.max' => 'Email pabrik maksimal 255 karakter.',

            // PIC for Facility
            'facility_pic_name.string' => 'Nama PIC pabrik harus berupa teks.',
            'facility_pic_name.max' => 'Nama PIC pabrik maksimal 255 karakter.',

            'facility_pic_title.max' => 'Jabatan PIC pabrik maksimal 100 karakter.',

            'facility_pic_phone.digits_between' => 'Nomor telepon PIC pabrik harus terdiri dari 10 hingga 15 digit.',

            'facility_pic_mobile_phone.regex' => 'Nomor ponsel PIC pabrik tidak valid.',

            'facility_pic_email.email' => 'Email PIC pabrik harus dalam format yang valid.',
            'facility_pic_email.max' => 'Email PIC pabrik maksimal 255 karakter.',

            // CP for Facility
            'facility_cp_name.string' => 'Nama CP pabrik harus berupa teks.',
            'facility_cp_name.max' => 'Nama CP pabrik maksimal 255 karakter.',

            'facility_cp_title.max' => 'Jabatan CP pabrik maksimal 100 karakter.',

            'facility_cp_phone.digits_between' => 'Nomor telepon CP pabrik harus terdiri dari 10 hingga 15 digit.',

            'facility_cp_mobile_phone.regex' => 'Nomor ponsel CP pabrik tidak valid.',

            'facility_cp_email.email' => 'Email CP pabrik harus dalam format yang valid.',
            'facility_cp_email.max' => 'Email CP pabrik maksimal 255 karakter.',

            // Other Facility
            'other_facility_name_and_address.string' => 'Nama dan alamat fasilitas lain harus berupa teks.',
            'other_facility_name_and_address.max' => 'Nama dan alamat fasilitas lain maksimal 500 karakter.',
        ]);




        $user = Auth::user();

        $data = [
            'user_id' => $user->id,
            'company_name' => $request->company_name,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'zip_code' => $request->zip_code,
            'phone' => $request->phone,
            'fax' => $request->fax,
            'company_email' => $request->company_email,
            'pic_name' => $request->pic_name,
            'pic_title' => $request->pic_title,
            'pic_phone' => $request->pic_phone,
            'pic_mobile_phone' => $request->pic_mobile_phone,
            'pic_email' => $request->pic_email,
            'cp_name' => $request->cp_name,
            'cp_title' => $request->cp_title,
            'cp_phone' => $request->cp_phone,
            'cp_mobile_phone' => $request->cp_mobile_phone,
            'cp_email' => $request->cp_email,
            'registration_type' => $request->registration_type,
            'application_type' => $request->application_type,
            'registration_status' => $request->registration_status,
            'product_type' => $request->product_type,
            'product_marketing_type' => $request->product_marketing_type,
            'total_employee' => $request->total_employee,
            'production_capacity' => $request->production_capacity,
            'npwp_number' => $request->npwp_number,

            'facility_manufacturer_name' => $request->facility_manufacturer_name,
            'facility_manufacturer_address' => $request->facility_manufacturer_address,
            'facility_city' => $request->facility_city,
            'facility_country' => $request->facility_country,
            'facility_zip_code' => $request->facility_zip_code,
            'facility_phone' => $request->facility_phone,
            'facility_fax' => $request->facility_fax,
            'facility_email' => $request->facility_email,
            'facility_pic_name' => $request->facility_pic_name,
            'facility_pic_title' => $request->facility_pic_title,
            'facility_pic_phone' => $request->facility_pic_phone,
            'facility_pic_mobile_phone' => $request->facility_pic_mobile_phone,
            'facility_pic_email' => $request->facility_pic_email,
            'facility_cp_name' => $request->facility_cp_name,
            'facility_cp_title' => $request->facility_cp_title,
            'facility_cp_phone' => $request->facility_cp_phone,
            'facility_cp_mobile_phone' => $request->facility_cp_mobile_phone,
            'facility_cp_email' => $request->facility_cp_email,
            'other_facility_name_and_address' => $request->other_facility_name_and_address,
        ];

        certificate::create($data);
        return redirect('/dashboard')->with('success', 'Successfully Created');
    }

    public function show(Request $request)
    {
        $certificate = certificate::find($request->id);
        return view('Dashboard/admin', compact('certificate'));
    }

    public function exportCertificates()
    {
        ob_end_clean();

        $companies = certificate::all();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No'); // Menambahkan kolom nomor
        $sheet->setCellValue('B1', 'Nama Perusahaan');
        $sheet->setCellValue('C1', 'Alamat');
        $sheet->setCellValue('D1', 'Kota');
        $sheet->setCellValue('E1', 'Negara');
        $sheet->setCellValue('F1', 'Kode Pos');
        $sheet->setCellValue('G1', 'Nomor Telepon');
        $sheet->setCellValue('H1', 'Nomor Fax');
        $sheet->setCellValue('I1', 'Email Perusahaan');
        $sheet->setCellValue('J1', 'Nama PIC');
        $sheet->setCellValue('K1', 'Jabatan PIC');
        $sheet->setCellValue('L1', 'Nomor Telp PIC');
        $sheet->setCellValue('M1', 'Nomor HP PIC');
        $sheet->setCellValue('N1', 'Email PIC');
        $sheet->setCellValue('O1', 'Nama CP');
        $sheet->setCellValue('P1', 'Jabatan CP');
        $sheet->setCellValue('Q1', 'Nomor Telp CP');
        $sheet->setCellValue('R1', 'Nomor HP CP');
        $sheet->setCellValue('S1', 'Email CP');
        $sheet->setCellValue('T1', 'Jenis Registrasi');
        $sheet->setCellValue('U1', 'Tipe Aplikasi');
        $sheet->setCellValue('V1', 'Status Registrasi');
        $sheet->setCellValue('W1', 'Jenis Produk');
        $sheet->setCellValue('X1', 'Tipe Pemasaran Produk');
        $sheet->setCellValue('Y1', 'Jumlah Karyawan');
        $sheet->setCellValue('Z1', 'Kapasitas Produksi');
        $sheet->setCellValue('AA1', 'Nomor NPWP');
        $sheet->setCellValue('AB1', 'Nama Pabrik');
        $sheet->setCellValue('AC1', 'Alamat Pabrik');
        $sheet->setCellValue('AD1', 'Kota Pabrik');
        $sheet->setCellValue('AE1', 'Negara Pabrik');
        $sheet->setCellValue('AF1', 'Kode Pos Pabrik');
        $sheet->setCellValue('AG1', 'Nomor Telp Pabrik');
        $sheet->setCellValue('AH1', 'Nomor Fax Pabrik');
        $sheet->setCellValue('AI1', 'Email Pabrik');
        $sheet->setCellValue('AJ1', 'Nama PIC Pabrik');
        $sheet->setCellValue('AK1', 'Jabatan PIC Pabrik');
        $sheet->setCellValue('AL1', 'Nomor Telp PIC Pabrik');
        $sheet->setCellValue('AM1', 'Nomor HP PIC Pabrik');
        $sheet->setCellValue('AN1', 'Email PIC Pabrik');
        $sheet->setCellValue('AO1', 'Nama CP Pabrik');
        $sheet->setCellValue('AP1', 'Jabatan CP Pabrik');
        $sheet->setCellValue('AQ1', 'Nomor Telp CP Pabrik');
        $sheet->setCellValue('AR1', 'Nomor HP CP Pabrik');
        $sheet->setCellValue('AS1', 'Email CP Pabrik');
        $sheet->setCellValue('AT1', 'Nama dan Alamat Fasilitas Lain');
        $sheet->setCellValue('AU1', 'Status');


        $row = 2; // Baris ke-2 untuk data
        foreach ($companies as $index => $company) {
            $sheet->setCellValue('A' . $row, $index + 1); // Menambahkan nomor urut
            $sheet->setCellValue('B' . $row, $company->company_name);
            $sheet->setCellValue('C' . $row, $company->address);
            $sheet->setCellValue('D' . $row, $company->city);
            $sheet->setCellValue('E' . $row, $company->country);
            $sheet->setCellValue('F' . $row, $company->zip_code);
            $sheet->setCellValue('G' . $row, $company->phone);
            $sheet->setCellValue('H' . $row, $company->fax);
            $sheet->setCellValue('I' . $row, $company->company_email);
            $sheet->setCellValue('J' . $row, $company->pic_name);
            $sheet->setCellValue('K' . $row, $company->pic_title);
            $sheet->setCellValue('L' . $row, $company->pic_phone);
            $sheet->setCellValue('M' . $row, $company->pic_mobile_phone);
            $sheet->setCellValue('N' . $row, $company->pic_email);
            $sheet->setCellValue('O' . $row, $company->cp_name);
            $sheet->setCellValue('P' . $row, $company->cp_title);
            $sheet->setCellValue('Q' . $row, $company->cp_phone);
            $sheet->setCellValue('R' . $row, $company->cp_mobile_phone);
            $sheet->setCellValue('S' . $row, $company->cp_email);
            $sheet->setCellValue('T' . $row, $company->registration_type);
            $sheet->setCellValue('U' . $row, $company->application_type);
            $sheet->setCellValue('V' . $row, $company->registration_status);
            $sheet->setCellValue('W' . $row, $company->product_type);
            $sheet->setCellValue('X' . $row, $company->product_marketing_type);
            $sheet->setCellValue('Y' . $row, $company->total_employee);
            $sheet->setCellValue('Z' . $row, $company->production_capacity);
            $sheet->setCellValue('AA' . $row, $company->npwp_number);
            $sheet->setCellValue('AB' . $row, $company->facility_manufacturer_name);
            $sheet->setCellValue('AC' . $row, $company->facility_manufacturer_address);
            $sheet->setCellValue('AD' . $row, $company->facility_city);
            $sheet->setCellValue('AE' . $row, $company->facility_country);
            $sheet->setCellValue('AF' . $row, $company->facility_zip_code);
            $sheet->setCellValue('AG' . $row, $company->facility_phone);
            $sheet->setCellValue('AH' . $row, $company->facility_fax);
            $sheet->setCellValue('AI' . $row, $company->facility_email);
            $sheet->setCellValue('AJ' . $row, $company->facility_pic_name);
            $sheet->setCellValue('AK' . $row, $company->facility_pic_title);
            $sheet->setCellValue('AL' . $row, $company->facility_pic_phone);
            $sheet->setCellValue('AM' . $row, $company->facility_pic_mobile_phone);
            $sheet->setCellValue('AN' . $row, $company->facility_pic_email);
            $sheet->setCellValue('AO' . $row, $company->facility_cp_name);
            $sheet->setCellValue('AP' . $row, $company->facility_cp_title);
            $sheet->setCellValue('AQ' . $row, $company->facility_cp_phone);
            $sheet->setCellValue('AR' . $row, $company->facility_cp_mobile_phone);
            $sheet->setCellValue('AS' . $row, $company->facility_cp_email);
            $sheet->setCellValue('AT' . $row, $company->other_facility_name_and_address);
            $sheet->setCellValue('AU' . $row, $company->status);

            $row++;
        }


        $writer = new Xlsx($spreadsheet);
        $fileName = 'companies.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
