<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function authenticate (Request $request)
    {
        // dd($request);
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // if (Auth::attemp($credentials)){
        //     $request->session()->regenerate();

        //     if (Auth::user()->role == 'admin'){
        //         return redirect()->route('a.welcome');
        //     }else if (Auth::user()->role == 'kasir'){
        //         return redirect()->route('k.welcome');
        //     }else if (Auth::user()->role == 'owner'){
        //         return redirect()->route('o.welcome');
        //     }

        //     return back()->withErrors([
        //         'email' => 'Username atau Password salah.',
        //     ]);
        // }

    

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::user()->role == 'admin') {
                return redirect('/');      
            }elseif(Auth::user()->role == 'kasir') {
                return redirect('/');
            }elseif(Auth::user()->role == 'owner') {
                return redirect('/');
            }
        }

        return back()->withErrors([
            'email' => 'Username atau password salah'
        ]);
        
    }
}
