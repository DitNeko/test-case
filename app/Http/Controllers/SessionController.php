<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


class SessionController extends Controller 
{
    function index () {
        return view('login');
    }

    function login (Request $request) {
     
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
        
            if (Auth::user()->role == 'admin') {
                return redirect('admin/dashboard')->with('success','selamat datang admin');
            } elseif (Auth::user()->role == 'user') {
                return redirect('/dashboard')->with('success','selamat datang '.Auth::user()->company_name);
            }
        }

        return redirect('/login')->with('error','password atau email salah');

    }

function register (){
    return view('register');
}
public function CreateRegister (Request $request){

   

    
    $request->validate([
        'email' => 'required|email|max:255|unique:users,email',
        'name' => 'required|string|max:255',
        'number' => 'required|unique:users,no_phone',
        'name_company' => 'required|string|max:255',
        'address' => 'required|string|max:500',
        'password' => 'required|string|min:8',
    ], [
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Email harus dalam format yang valid.',
        'email.max' => 'Email maksimal 255 karakter.',
        'email.unique' => 'Email sudah terdaftar.',
        
        'name.required' => 'Nama wajib diisi.',
        'name.string' => 'Nama harus berupa teks.',
        'name.max' => 'Nama maksimal 255 karakter.',
        
        'number.required' => 'Nomor telepon wajib diisi.',
        'number.unique' => 'Nomor telepon sudah terdaftar.',
        
        'name_company.required' => 'Nama perusahaan wajib diisi.',
        'name_company.string' => 'Nama perusahaan harus berupa teks.',
        'name_company.max' => 'Nama perusahaan maksimal 255 karakter.',
        
        'address.required' => 'Alamat wajib diisi.',
        'address.string' => 'Alamat harus berupa teks.',
        'address.max' => 'Alamat maksimal 500 karakter.',
        
        'password.required' => 'Password wajib diisi.',
        'password.string' => 'Password harus berupa teks.',
        'password.min' => 'Password minimal 8 karakter.',
      
    ]);
    
    $credentials = [

        'email' => $request->email,
        'name' => $request->name,
        'no_phone' => $request->number,
        'company_name' => $request->name_company,
        'address' => $request->address,
        'password' =>Hash::make($request->password), 
    ];
   
$user =  user::create($credentials);
Auth::login($user);

        // Mengirim email verifikasi
        $user->sendEmailVerificationNotification();
return redirect()->route('verification.notice')->with('success','berhasil registrasi');

}

public function showVerificationNotice()
    {
        return view('verifikasi');
    }
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill(); 
        return redirect('/logout')->with('message', 'Email verified successfully!');
    }

    // Mengirim ulang email verifikasi
    public function resendVerification(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }


    function logout (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success','berhasil Logout dan terimakasih');
    }
   




}
