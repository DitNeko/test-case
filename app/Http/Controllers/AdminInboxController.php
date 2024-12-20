<?php

namespace App\Http\Controllers;

use App\Models\certificate;
use App\Models\foodinfo;
use App\Models\Nib;
use App\Models\rate;
use Illuminate\Http\Request;

class AdminInboxController extends Controller
{
    function index(){
 $notifFood = foodinfo::where('status','pending')->get();
 $notifCerti = certificate::where('status','pending')->get();
 $notifNib = Nib::where('status','pending')->get();
 $notifRate = rate::all();
        return view('service/inboxadmin',compact('notifFood','notifCerti','notifNib','notifRate'));
       }
}
