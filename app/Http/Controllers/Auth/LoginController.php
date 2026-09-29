<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // =====================================
    // MENAMPILKAN HALAMAN LOGIN
    // =====================================

    public function showLoginForm()
    {
        return view('auth.login');
    }


    // =====================================
    // PROSES LOGIN
    // =====================================

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            // Membuat session baru setelah login
            $request->session()->regenerate();

            // Jika sebelumnya ingin membuka halaman tertentu
            return redirect()->intended('/');
        }

        // Jika login gagal
        return back()
            ->withErrors([
                'username' => 'Username atau password salah.',
            ])
            ->withInput($request->only('username'));
    }


    // =====================================
    // MENAMPILKAN HALAMAN REGISTER
    // =====================================

    public function showRegisterForm()
    {
        return view('auth.register');
    }


    // =====================================
    // PROSES REGISTER
    // =====================================

    public function register(Request $request)
    {
        // Validasi
        $request->validate([
            'name' => 'required|string|max:255',

            'username' => [
                'required',
                'string',
                'max:255',
                'unique:users,username'
            ],

            'password' => [
                'required',
                'min:6',
                'confirmed'
            ],
        ]);


        // Membuat user baru
        User::create([
            'name' => $request->name,

            'username' => $request->username,

            'password' => Hash::make($request->password),

            'role' => 'guru',
        ]);


        // Setelah berhasil register,
        // arahkan ke halaman login
        return redirect()
            ->route('login')
            ->with(
                'success',
                'Registrasi berhasil! Silakan login.'
            );
    }


    // =====================================
    // LOGOUT
    // =====================================

    public function logout(Request $request)
    {
        Auth::logout();

        // Hapus session
        $request->session()->invalidate();

        // Buat token CSRF baru
        $request->session()->regenerateToken();

        // Kembali ke login
        return redirect()
            ->route('login')
            ->with(
                'success',
                'Anda berhasil logout.'
            );
    }
}
