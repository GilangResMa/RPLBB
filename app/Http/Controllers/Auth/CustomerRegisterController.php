<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerRegisterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pelanggan,emailPelanggan',
            'kontak' => 'required|string|max:20',
            'password' => 'required|string|min:8',
        ]);

        Pelanggan::create([
            'namaPelanggan' => $request->name,
            'emailPelanggan' => $request->email,
            'kontakPelanggan' => $request->kontak,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful!');
    }
}