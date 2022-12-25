<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Kategori;
use App\Models\Barang;
use App\Models\Komentar;
use App\Models\Province;
use App\Models\City;
use App\Models\User;
use App\Models\Diskon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = DB::table('barangs')->select('barangs.id', 'barangs.nama', 'barangs.harga', 'barangs.stok', 'barangs.gambar', 'kategoris.id as id_kategori')->join('kategoris', 'kategoris.id', '=', 'barangs.id_kategori')->get();
        $kategori = Kategori::get();
        return view('frontends.shop', [
            'barang' => $barang,
            'kategori' => $kategori,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product($id)
    {
        $barang = Barang::findOrFail($id);
        $kategori = Kategori::get();
        $komentar = Komentar::select('komentars.id_barang', 'komentars.id_user', 'komentars.komentar', 'users.name')->where('id_barang', $id)->join('users', 'komentars.id_user', '=', 'users.id')->get();
        // dd($user);
        $provinsi = Province::get();
        // dd($provinsi);
        return view('frontends.product', [
            'barang' => $barang,
            'kategori' => $kategori,
            'komentar' => $komentar,
            'provinsi' => json_decode($provinsi),
        ]);
    }

    public function getCity(Request $request)
    {
        $provinsi =  $request->get('id_province');
        $kota = DB::table('cities')->where('province_id', $provinsi)->get();
        return Response::json($kota);
    }

    public function getCost(Request $request)
    {
        if ($request->ajax()) {
            $origin = $request->get('origin');
            $destination = $request->get('destination');
            $weight = $request->get('weight');
            $courier = $request->get('courier');
            
            $ongkir = RajaOngkir::ongkosKirim([
                'origin'        => $origin,     // ID kota/kabupaten asal
                'destination'   => $destination,      // ID kota/kabupaten tujuan
                'weight'        => $weight,    // berat barang dalam gram
                'courier'       => $courier    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
            ])->get();
            // $ongkir = RajaOngkir::ongkosKirim([
            //     'origin'        => 155,     // ID kota/kabupaten asal
            //     'destination'   => 80,      // ID kota/kabupaten tujuan
            //     'weight'        => 1300,    // berat barang dalam gram
            //     'courier'       => 'jne'    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
            // ]);
            // dd($ongkir);
            return Response::json($ongkir);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShopRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShopRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShopRequest  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShopRequest $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
