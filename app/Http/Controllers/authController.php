<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Http\Requests\registerRequest;
use Illuminate\Http\Request;
use App\Http\Models\User;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function auth(loginRequest $request)
    {
        $credentials = $request->validated();
        // dump($credentials);

        if (filter_var($credentials['email_username'], FILTER_VALIDATE_EMAIL)){
            Auth::attempt(['email'=>$credentials['email_username'], 'password'=>$credentials['password']]);
        } else{
            Auth::attempt(['username' => $credentials['email_username'], 'password' => $credentials['password']]);
        }

        if (Auth::check()){
            $request->session()->regenerate();
            if (Auth::user()->is_admin) {
                // return redirect()->route('dashboard');
                return 'halaman admin';
            }
            return redirect()->route('index');
        }
        // return redirect()->route('index');
        $alert = [
            'type'  => 'danger',
            'message'   => 'Login Gagal. Data tidak sesuai.'
        ];
        return back()->withInput()->with('alert', $alert);

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     if (Auth::user()->is_admin) {
        //         return redirect()->route('dashboard');
        //     }
        //     // return redirect()->route('index');
        //     dump($credentials);
        // }

        
    }
    public function register()
    {
        return view('auth.register');
    }

    public function simpan(registerRequest $request)
    {
        $data = $request->validated();

        $user           = new ModelsUser();
        $user->name     = $data['name'];
        $user->username = $data['username'];
        $user->email    = $data['email'];
        $user->password = Hash::make($data['password']);

        if ($user->save()) {
            $alert = [
                'type'      => 'success',
                'message'   => 'Pendaftaran berhasil. Silahkan login.'
            ];
            return redirect()->route('login')->with('alert', $alert);
        } else {
            $alert = [
                'type'      => 'danger',
                'message'   => 'Pendaftaran gagal.'
            ];
            return back()->withInput()->with('alert', $alert);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}
