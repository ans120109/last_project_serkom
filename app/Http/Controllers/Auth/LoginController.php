<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

            // Akun berstatus nonaktif tidak boleh masuk
            if (Auth::user()->isInactive()) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()
                    ->withErrors([
                        'username' => 'Akun Anda tidak aktif. Hubungi admin.',
                    ])
                    ->withInput($request->only('username'));
            }

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
