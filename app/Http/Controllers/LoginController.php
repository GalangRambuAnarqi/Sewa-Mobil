<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            return redirect()->route('home');
        }

        return redirect()->route('login')->with('error', 'Email / Password Salah');
    }

    public function register_tambah()
    {
        $msg = [
            'name.required' => "wajib diisi",
            'email.required' => "wajib diisi",
            'email.email' => "dns wajib diisi",
            'email.unique' => "email sudah ada",
            'password.required' => "wajib diisi",
            'password.same' => "password tidak sama",
            'password2.same' => "password tidak sama",
        ];

        request()->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|same:password2',
            'password2' => 'required|same:password',
        ], $msg);

        $data = request()->all();
        $data['password'] = Hash::make(request()->password);

        User::create($data);

        // Auth
        if (Auth::attempt(['email' => request()->email, 'password' => request()->password])) {
            request()->session()->regenerate();

            return redirect()->route('home');
        }
    }

    public function home()
    {
        $data['active'] = 'home';

        if (Auth::user()->level == 'admin') {
            $data['mobil'] = Mobil::count();
            $data['user'] = User::where('level', 'user')->count();

            return view('admin.home', $data);
        } else {
            return view('user.home', $data);
        }
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}
