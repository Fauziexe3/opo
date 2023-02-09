<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Session;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerStore(Request $request)
    {
        request()->validate(
            [
                'name' => 'required|min:4|unique:users',
                'email' => 'required|email:rfc|unique:users',
                'password' => 'required|min:8',
            ],
            [
                'name.required' => 'Nama harus diisi !',
                'name.unique' => 'Nama telah digunakan ;(',
                'name.min' => 'Nama minimal harus 4 karakter !!',
                'email.required' => 'Email harus diisi',
                'email.unique' => 'Email telah digunakan ;(',
                'password.required' => 'Password harus diisi !',
                'password.min' => 'Password minimal harus 8 karakter !!',
            ]
        );
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60)

        ]);

        return view('index')->with('alert', 'Registrasi Berhasil!');
    }

    public function login()
    {
        return view('index1');
    }

    public function loginStore(Request $request)
    {
        request()->validate(
            [
                'email' => 'required',
                'password' => 'required|min:8',
            ],
            [
                'email.required' => 'Email harus diisi',
                'email.unique' => 'Email telah digunakan ;(',
                'password.required' => 'Password harus diisi !',
                'password.min' => 'Password minimal harus 8 karakter !!',
            ]
        );
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect('/coba');
        } else {
            // Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('alert', 'Anda telah logout');
    }
}
