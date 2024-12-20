<?php

namespace App\Http\Controllers;
use App\Models\Training;
use App\Models\checkingtraining;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        

        // Ambil data pelatihan berdasarkan pelatihan_id dan user_id
        
     
        $data = Training::all();
        return view('service/pelatihanland',compact('data','user'));
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
        $data = [
            'user_id'=>$user->id,
            'pelatihan_id'=>$request->id,
            'zoom'=>$request->link,
            'foto'=>$request->foto,
            'name'=>$request->title,
            'email'=>$user->email,
            'company_name'=>$user->company_name,
            'no_phone'=>$user->no_phone,
        ];
        checkingtraining::create($data);
        return redirect()->to('/inbox');
     
        
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
        $user = Auth::user();
        $user1 = Auth::user()->id;
        $user3= user::find($user1);
        
        // Ambil data pelatihan dan pendaftaran
       //notif pelatihan
      
        $details = Training::where('id',$id)->first();
        $quotacek= checkingtraining::where('pelatihan_id',$details->id)->count();

        return view('service/pelatihan',compact('details','user','quotacek'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
