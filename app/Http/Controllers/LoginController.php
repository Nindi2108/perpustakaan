<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController    extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah',
        ])->withInput();
    }

    public function loginProsess(Request $request)
    {
        try {
            $validateData = $request->validate(
                [
                    'username' => 'required|string|min:3|max:50|unique:users,username',
                    'password' => 'required',
                ],
                [
                    'username.required' => 'user name wajib diisi',
                    'username.username' => 'username tidak valid',
                    'password.required' => 'Password wajib diisi',
                ],
            );

            $exist = User::where('username', $validateData['username'])->first();

            if (!$exist) {
                return back()
                    ->withErrors([
                        'username' => 'username belum terdaftar',
                    ])
                    ->withInput();
            }

            if (auth()->attempt($validateData)) {
                $request->session()->regenerate();

                // Add a success message after login
                return redirect()->route('buku')->with('info', 'Kamu berhasil login!');
            }

            return back()
                ->withErrors([
                    'username' => 'username atau password salah',
                ])
                ->withInput();
        } catch (ValidationException $exception) {
            return back()->withErrors($exception->errors())->withInput();
        } catch (\Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'file' => $th->getFile(),
                'line' => $th->getLine(),
            ]);
            return $th->getMessage();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function showRegister()
{
    return view('auth.register');
}

public function register(Request $request)
{
    // Validasi input dulu
    $request->validate([
        'username' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
    ]);

    // Simpan ke database
    User::create([
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Redirect atau login otomatis
    return redirect()->route('login')->with('success', 'Register berhasil. Silakan login.');

}
}

