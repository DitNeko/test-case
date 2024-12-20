<?php

namespace App\Http\Controllers;

use App\Models\foodinfo;
use App\Models\Nib;
use App\Models\certificate;
use Illuminate\Http\Request;

class UpdateStatusFoodInfo extends Controller
{

   function approved(Request $request, string $id)
   {
      $update =  ['status' => $request->status];
      foodinfo::where('id', $id)->update($update);
      return redirect()->back()->with('success', 'berhasil menerima data food info');
   }

   function rejected(Request $request, string $id)
   {
      $update =  ['status' => $request->status];
      foodinfo::where('id', $id)->update($update);
      return redirect()->back()->with('success', 'berhasil hapus data food info');
   }
}
