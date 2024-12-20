<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelatihans = Training::all();
    
        return view('service/tabelPelatihan',compact('pelatihans')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('service/ajukanPelatihan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

       

        $data = [
            'title' => $request->judul,
            'sub' => $request->sub,
            'date' => $request->date,
            'status' => $request->status,
            'price' => $request->price,
            'quota' => $request->quota,
            'pemateri' => $request->pemateri,
            'cource' => $request->cource,
            'deskripsi' => $request->deskripsi,
            'zoom'=>$request->link,
        ];

        $poto = $request->file('poto');
        $potoex= $poto->extension();
        $potocn= date('ymdhis').".".$potoex;
        $poto->storeAs('Peltihan',$potocn,'public');
        $data['poto'] = $potocn;
        

        Training::create($data);
        
        return redirect()->to('/ajukanPelatihan')->with('success','berhasil menambahkan pelatihan baru');
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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $editData= Training::where('id',$id)->first();
        $update = [
            'zoom'=>$request->link,
        ];
        
        Training::where('id',$id)->update($update);
        return redirect()->to('/ajukanPelatihan',compact('editData'))->with('success','berhasil mengupdate link pelatihan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Training::where('id',$id)->delete();
        return  redirect()->to('/ajukanPelatihan')->with('success', 'berhasil hapus data pelatihan');
    }
}
