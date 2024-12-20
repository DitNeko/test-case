<?php

namespace App\Http\Controllers;

use App\Models\certificate;
use App\Models\Nib;
use App\Models\foodinfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\rate;
use App\Models\checkingtraining;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $user1 = Auth::user()->id;
        $user2 = Auth::user();
        $user3= user::find($user1);
        
        //notif pelatihan
        $data = $user3->checkingtraining;

        //inbox certi
        $notifCerti= certificate::where('status', 'pending')->where('user_id',$user1)->get();

        //inbox Nib
        $notifNib= Nib::where('status', 'pending')->where('user_id',$user1)->get();

        //inbox food
        $notifFood= foodinfo::where('status', 'pending')->where('user_id',$user1)->get();

        //inbox rate
        $notifRate= $user2->rate;

        $pic = Auth::user();
        return view('service/inbox',compact('data','pic','notifFood','notifCerti','notifNib','notifRate'));
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
