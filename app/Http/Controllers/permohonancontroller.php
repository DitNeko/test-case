<?php

namespace App\Http\Controllers;

use App\Models\certificate;
use App\Models\Nib;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class permohonancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_Id = Auth::user()->id;

        $user = User::find($user_Id);
        $dataCerti= certificate::where('user_id', $user_Id)->get();
        $dataNib= Nib::where('user_id', $user_Id)->get();

// Cek jika data $companies tidak kosong
if ($dataCerti->isEmpty()) {
    
}
        $dataFood = $user->foodinfo;
      
        // $dataNib = $user->Nib;
       return view('PermohonanSaya',compact('dataCerti','dataFood','dataNib','user'));
    }

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
    public function destroy(string $id)
    {
        //
    }
}
