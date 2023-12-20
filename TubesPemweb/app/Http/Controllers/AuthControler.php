<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticating(Request $request)
    {
        /* $credentials = $request->validate([
            'email' => ['required', 'email'],
        ]); */

        $validatedData = $request->validate([
            'email' => 'required|email',
        ]);


        $email = $request->input('email'); // Ambil email dari input form

        $participant = Customer::where('email', $email)->first(); // ambil data participant berdasarkan email


        if ($participant) {

            session([
                'idLogin' => $participant->id,
                'nameLogin' => $participant->name,
                'emailLogin' => $participant->email,
            ]);

            Auth::login($participant);
            session()->flash('status', 'berhasil');
            session()->flash('message', 'Selamat Datang ' . $participant->name . '!');

            //  dd($participant, $email, session()->all());
            return redirect('/nolan.com/home'); // Gunakan route yang sesuai
        }

        session()->flash('status', 'gagal');
        session()->flash('message', 'Email tidak terdaftar');

        return redirect('/nolan.com/login'); // Pastikan route diawali dengan '/'
    }


    public function logout(Request $request)
    {
        Auth::logout();
        session()->flush();
        return redirect('/vasco.com/login');
    }
}
