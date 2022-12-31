<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Permintaan;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function home()
    {
        $user = User::all()->count();
        $barang = Barang::all()->count();
        $vendor = Vendor::all()->count();
        $permintaan = Permintaan::all()->count();
        return view('basetemplate.home', compact('user', 'barang', 'vendor', 'permintaan'));
    }
}
