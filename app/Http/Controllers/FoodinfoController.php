<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\checkingtraining;
use App\Models\foodinfo;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class FoodinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $user_Id = Auth::user()->id;
        $pic = Auth::user();
        $user = User::find($user_Id);
        $data = $user->foodinfo;


        return view('service/tabelmakansiang', compact('data','pic'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pic = Auth::user();
        return view('service/makangratis',compact('pic'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = Auth::user();

        // Define validation rules
        $request->validate([
            'company_name' => 'required|string|max:255',
            'schedule' => 'required|',
            'food' => 'required|string|max:255',
            'fruit' => 'required|string|max:255',
            'snack' => 'required|string|max:255',
            'drink' => 'required|string|max:255',
        ],[
            'company_name.required' => 'Nama perusahaan wajib diisi.',
            'company_name.string' => 'Nama perusahaan harus berupa teks.',
            'company_name.max' => 'Nama perusahaan maksimal 255 karakter.',
            'schedule.required' => 'Jadwal wajib dipilih.',
            'schedule.in' => 'Pilih jadwal yang valid (senin-sabtu).',
            'food.required' => 'Makanan wajib dipilih.',
            'food.in' => 'Pilih makanan yang tersedia dalam pilihan.',
            'drink.required' => 'Minuman wajib dipilih.',
            'drink.in' => 'Pilih minuman yang tersedia dalam pilihan.',
            'fruit.required' => 'Buah wajib dipilih.',
            'fruit.in' => 'Pilih buah yang tersedia dalam pilihan.',
            'snack.required' => 'Snack wajib dipilih.',
            'snack.in' => 'Pilih snack yang tersedia dalam pilihan.',
        ]);


        $data = [
            'user_id' => $user->id,
            'company' => $request->company_name,
            'schedule' => $request->schedule,
            'food' => $request->food,
            'fruit' => $request->fruit,
            'snack' => $request->snack,
            'drink' => $request->drink,
        ];
        foodinfo::create($data);

        return redirect()->to('/layanan/makanSiang')->with('success', 'berhasil menambahkan data makan siang');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pic = Auth::user();
        $dataEdit = foodinfo::where('id', $id)->first();
        return view('service/editmakangratis', compact('dataEdit','pic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $dataUpdate = [

            'schedule' => $request->schedule,
            'food' => $request->food,
            'fruit' => $request->fruit,
            'snack' => $request->snack,
            'drink' => $request->drink,
            'status' => $request->status,
        ];
        foodinfo::where('id', $id)->update($dataUpdate);
        return redirect()->to('/layanan/makanSiang')->with('success', 'berhasil update data makan siang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        foodinfo::where('id', $id)->delete();
        return redirect()->to('/layanan/makanSiang')->with('success', 'berhasil hapus data makan siang');
    }
}
