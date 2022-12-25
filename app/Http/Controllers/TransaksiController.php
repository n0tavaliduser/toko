<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Barang;
use App\Models\Diskon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = auth()->user()->id;
        $transaksi = Transaksi::where('id_pembeli', $id)->get();
        $status = $request->get('diskon');
        // dd($status);
        return view('frontends.transaksi', [
            'transaksi' => $transaksi,
            'status' => $status
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_invoice(Request $request, $id)
    {
        $data = Transaksi::findOrFail($id);
        $barang = Barang::where('id', $data->id_barang)->get()->toArray();
        $diskon = Diskon::all()->toArray();
        
        $pdf = PDF::loadview('frontends.invoice', [
            'data' => $data,
            'barang' => $barang,
            'diskon' => $diskon
        ]);

        return view('frontends.invoice', [
            'data' => $data,
            'barang' => $barang,
            'diskon' => $diskon
        ]);
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
     * @param  \App\Http\Requests\StoreTransaksiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransaksiRequest $request)
    {
        $namadiskon = $request->get('kode_voucher');
        $isDiskon = DB::table('diskons')->where('kode_voucher', $namadiskon)->get()->toArray();
        // dd($datadiskon);

        if (count($isDiskon) === 0) {
            $request->validate([
                'id_barang' => 'required',
                'id_pembeli' => 'required',
                'jumlah' => 'required',
                'total_harga' => 'required',
                'alamat' => 'required',
                'ongkir' => 'required',
            ]);

            $request['status'] = 0;
            $input = $request->all();

            Transaksi::create($input);
            $status = 0;
    
            return redirect()->route('product-buy', ['diskon' => $status]);
        }else {
            if (($isDiskon[0]->aktif === 1) || (Carbon::parse($isDiskon[0]->tanggal_mulai_berlaku)->age !== 0) || (Carbon::parse($isDiskon[0]->tanggal_akhir_berlaku)->age === 0)) {
                $request->validate([
                    'id_barang' => 'required',
                    'id_pembeli' => 'required',
                    'jumlah' => 'required',
                    'alamat' => 'required',
                    'ongkir' => 'required',
                ]);
    
                $besardiskon = $isDiskon[0]->besar_diskon;
                $hargabaru = $request->get('total_harga') - $besardiskon;
                $request['total_harga'] = $hargabaru;
                $request['status'] = 0;
                $input = $request->all();
    
                Transaksi::create($input);
                $status = 1;
    
                return redirect()->route('product-buy', ['diskon' => $status]);
            }else {
                $request->validate([
                    'id_barang' => 'required',
                    'id_pembeli' => 'required',
                    'jumlah' => 'required',
                    'total_harga' => 'required',
                    'alamat' => 'required',
                    'ongkir' => 'required',
                ]);
        
                $request['status'] = 0;
                $input = $request->all();
    
                Transaksi::create($input);
                $status = 2;
    
                return redirect()->route('product-buy', ['diskon' => $status]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransaksiRequest  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
