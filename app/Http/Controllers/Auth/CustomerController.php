<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    // Registration
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pelanggan,emailPelanggan',
            'kontak' => 'required|string|max:20',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'namaPelanggan' => $request->name,
            'emailPelanggan' => $request->email,
            'kontakPelanggan' => $request->kontak,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful!');
    }

    // Login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'emailPelanggan' => $request->email,
            'password' => $request->password,
        ];

        // Debug: Cek apakah user ada
        $user = User::where('emailPelanggan', $request->email)->first();
        if (!$user) {
            return back()->withErrors([
                'email' => 'User not found.',
            ]);
        }

        // Debug: Cek password
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'email' => 'Password incorrect.',
            ]);
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/profile'); // Gunakan / sebelum profile
        }

        return back()->withErrors([
            'email' => 'Authentication failed.',
        ]);
    }
    // Profile
    public function showProfile()
    {
        return view('profile');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
