<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\certificate;
use App\Models\Training;
use App\Models\Foodinfo;
use App\Models\Nib;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $certificates = certificate::orderByRaw("FIELD(status, 'pending', 'approved', 'rejected')")->get();
        $nibs = Nib::orderByRaw("FIELD(status, 'pending', 'approved', 'rejected')")->get();
        $food = Foodinfo::all();
        $training = Training::all();
        $users = User::count();
        $usersCerti = certificate::count();
        $usersNib = Nib::count();
        return view('Dashboard/admin', compact('certificates', 'food', 'training', 'nibs', 'users','usersCerti','usersNib'));
    }

    public function approve($id)
    {
        $certificates = certificate::findOrFail($id);

        // Update status menjadi 'approved' dan simpan admin yang melakukan approve
        $certificates->status = 'approved';
        $certificates->save();

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil di-approve!');
    }

    public function reject($id)
    {
        $certificates = certificate::findOrFail($id);

        // Update status menjadi 'rejected' dan simpan admin yang melakukan reject
        $certificates->status = 'rejected';
        $certificates->save();

        return redirect()->route('pengajuan.index')->with('failed', 'Pengajuan berhasil di-reject!');
    }

    public function approveNib($id)
    {
        $nibs = Nib::findOrFail($id);

        // Update status menjadi 'approved' dan simpan admin yang melakukan approve
        $nibs->status = 'approved';
        $nibs->save();

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil di-approve!');
    }

    public function rejectNib($id)
    {
        $nibs = Nib::findOrFail($id);

        $nibs->status = 'rejected';
        $nibs->save();

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil di-reject!');
    }

 
    function deleteNib($id){
        Nib::where('id',$id)->delete();
        return redirect()->to('/admin/dashboard')->with('success', 'Data NIB berhasil di Hapus');
    }
    function deleteCertificate($id){
        certificate::where('id',$id)->delete();
        return redirect()->to('/admin/dashboard')->with('success', 'Data Sertifikat berhasil di Hapus');
       }
}
