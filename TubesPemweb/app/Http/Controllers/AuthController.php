<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Kreait\Laravel\Firebase\Facades\Firebase;

use Kreait\Firebase\Factory;
use Firebase\ServiceAccount;
use App\Models\User;


use Illuminate\Http\Request;

class AuthController extends Controller
{

    private $firebaseAuth;

    public function __construct()
    {
        $this->firebaseAuth = Firebase::auth();
    }

    public function register(Request $request)
    {
        return view('authentication.register');
    }
    public function registration(Request $request)
    {

        // validate request data
        $validator = $request->validate([
            'email' => 'required|email|unique:users, email',
            'password' => 'required}|min:6',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        try {
            $createdUser = $this->firebaseAuth->createUserWithEmailAndPassword($email, $password);
            Session::flash('success', 'Registration successful!');
            echo ('ping');
        } catch (\Exception $e) {
            Session::flash('error', 'Registration failed. Please try again.');
            echo ('pong');
        }
        echo ('prank');
        return redirect()->route('login');
    }

    public function login()
    {
        return view('authentication.login');
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
            return redirect('/vasco.com/home'); // Gunakan route yang sesuai
        }

        session()->flash('status', 'gagal');
        session()->flash('message', 'Email tidak terdaftar');

        return redirect('/vasco.com/login'); // Pastikan route diawali dengan '/'
    }


    public function logout()
    {
        Auth::logout();
        session()->flush();

        return redirect('/vasco.com');
    }
}
