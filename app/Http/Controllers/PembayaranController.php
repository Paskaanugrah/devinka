<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pesan;

class PembayaranController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [ 
        'name' => 'required', 
        'nik' => 'required|min:9', 
        'no_telp' => 'required|min:9', 
        'alamat' => 'required',
        'mobil' => 'required', 
        ]); 
        $input = $request->all(); 
        $pesan = Pesan::create($input); 
        return redirect()->route('pembayaran') 
        ->with('success','PEMESANAN MOBIL ANDA BERHASIL'); 
    }
}
