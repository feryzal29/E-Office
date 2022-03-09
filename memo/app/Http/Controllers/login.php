<?php

namespace App\Http\Controllers;
use App\Models\setting;
use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Alert;

class login extends Controller
{
    public function index()
    {
        $query = setting::first();
        $data = ['login' => $query];
        return view('login.index',$data);
    }
    public function authentication(Request $request)
    {
        $credential = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($credential)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->with('warning','Pastikan Username dan Password Benar');
    }
    public function logout(Request $request)
    {
        auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
    
        return redirect('/login');

    }
}