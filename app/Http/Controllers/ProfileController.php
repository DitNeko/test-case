<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Auth::user();
        return view("myProfile", compact('data'));
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
        //
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
        $user = User::where('id', $id)->where('email', Auth::user()->email)->first();

        // Cek jika user tidak ditemukan
        if (!$user) {
            return redirect()->route('profil')->with('error', 'User not found or you are not authorized to edit this profile.');
        }

        // Mengirim data user ke view edit
        return view('profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Mencari user berdasarkan ID dan email pengguna yang sedang login
        $post = User::where('id', $id)->where('email', Auth::user()->email)->first();


        $request->validate([
          // optional jika update tanpa email baru
            'bio' => 'nullable|string|max:1000', 
            'profile' => 'nullable|image|mimes:jpg,jpeg,png|max:10440' // optional jika update tanpa gambar baru
        ], [
           
            'bio.string' => 'Bio harus berupa teks.',
            'bio.max' => 'Bio maksimal 1000 karakter.',
            
            'profile.image' => 'Foto profil harus berupa gambar.',
            'profile.mimes' => 'Foto profil harus berformat jpg, jpeg, atau png.',
            'profile.max' => 'Ukuran foto profil maksimal 10 MB.',
        ]);
        

        // Update data

        $post->name = $request->input('nama');
        $post->company_name = $request->input('name_company');
        $post->address = $request->input('addres');
        $post->no_phone = $request->input('no_hp');
        $post->email = $request->input('email');
        $post->bio = $request->input('bio');

        if ($post->picture) { // Sesuaikan dengan 'picture' yang benar
            Storage::disk('public')->delete('profile/' . $post->picture);
        }


        $poto = $request->file('profile');
        $potoex = $poto->extension();
        $potocn = date('ymdhis') . "." . $potoex;
        $poto->storeAs('profile', $potocn, 'public');
        $post->picture = $potocn;

        $post->save();

        return redirect()->to('/profil')->with('success', 'berhasil update data profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
