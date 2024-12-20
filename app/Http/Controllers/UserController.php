<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class UserController extends Controller
{
    public function index()
    {
        $data = Auth::user(); // contoh mengambil data pengguna
    return view('Dashboard.user', compact('data'));
    }

    public function exportUsers()
    {
        ob_end_clean();

        // Buat spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header untuk file Excel
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Nama Perusahaan');
        $sheet->setCellValue('D1', 'Alamat');
        $sheet->setCellValue('E1', 'Email');
        $sheet->setCellValue('F1', 'Nomor Telepon');
        $sheet->setCellValue('G1', 'Bio');
        $sheet->setCellValue('H1', 'Role');
        $sheet->setCellValue('I1', 'Picture');

        // Ambil data dari database
        $users = User::all();

        // Masukkan data ke spreadsheet
        $row = 2; // mulai dari baris kedua
        foreach ($users as $user) {
            $sheet->setCellValue('A' . $row, $user->id);
            $sheet->setCellValue('B' . $row, $user->name);
            $sheet->setCellValue('C' . $row, $user->company_name);
            $sheet->setCellValue('D' . $row, $user->address);
            $sheet->setCellValue('E' . $row, $user->email);
            $sheet->setCellValue('F' . $row, $user->no_phone);
            $sheet->setCellValue('G' . $row, $user->bio);
            $sheet->setCellValue('H' . $row, $user->role);
            $sheet->setCellValue('I' . $row, $user->picture);
            $row++;
        }

        // Buat writer dan simpan file
        $writer = new Xlsx($spreadsheet);
        $fileName = 'data_users.xlsx';

        // Mengatur response untuk download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');

        // Hapus buffer output dan simpan file
        $writer->save('php://output');
        exit; // Hentikan eksekusi script
    }
    public function service (){
        $data = Auth::user(); // contoh mengambil data pengguna
        return view('service.layanan', compact('data'));
    }
    public function rating (){
        $data = Auth::user(); // contoh mengambil data pengguna
        return view('surveykepuasan', compact('data'));
    }
}
