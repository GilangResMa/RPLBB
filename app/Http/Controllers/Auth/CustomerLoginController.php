<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Hash;

class CustomerLoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $pelanggan = Pelanggan::where('emailPelanggan', $request->email)->first();

        if ($pelanggan && Hash::check($request->password, $pelanggan->password)) {
            // Simpan data pelanggan ke session
            session(['pelanggan_id' => $pelanggan->idPelanggan, 'nama_pelanggan' => $pelanggan->namaPelanggan]);
            return redirect('/')->with('success', 'Login berhasil!');
        }

        return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
    }
}