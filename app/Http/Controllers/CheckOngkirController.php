<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class CheckOngkirController extends Controller
{
    // fungsi index digunakan untuk menampilkan view
    public function index()
    {
        $provinces = Province::pluck('name', 'province_id');
        return view('ongkir', compact('provinces'));
    }

    // fungsi getCities digunakan untuk mendapatkan data kota berdasarkan kode provinsi dalam bentuk data JSON
    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('name', 'city_id');
        return response()->json($city);
    }

    // fungsi check_ongkir digunakan untuk menghitung dari ongkos kirim yang mana datanya akan dikembalikan dalam bentuk JSON
    public function check_ongkir(Request $request)
    {
        $cost = RajaOngkir::ongkosKirim([
            'origin'        => $request->city_origin, // ID kota/kabupaten asal
            'destination'   => $request->city_destination, // ID kota/kabupaten tujuan
            'weight'        => $request->weight, // berat barang dalam gram
            'courier'       => $request->courier // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();


        // kembalikan variable $cost untuk mendapatkan total ongkir
        return response()->json($cost);
    }
}
