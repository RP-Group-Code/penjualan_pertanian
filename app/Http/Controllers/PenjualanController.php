<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Gudang;
use App\Models\GudangRetur;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan['penjualans'] = penjualan::all();
        return view('penjualan.index', $penjualan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['gudangs'] = Gudang::all();
        $data['customers'] = Customer::all();
        return view('penjualan.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penjualan = new Penjualan();
        // $pass = password_hash($request->password, PASSWORD_DEFAULT);
        $penjualan->gudang_id = $request->gudang_id;
        $penjualan->customer_id = $request->customer_id;
        $penjualan->jumlah = $request->jumlah;
        $penjualan->harga = $request->harga;
        $penjualan->keterangan = $request->keterangan;
        $penjualan->user_id = $request->user_id;
        
        $gudang_utama = Gudang::find($request->gudang_id);

        if ($penjualan != null) {
            $gudang_utama->jumlah_stok = $gudang_utama->jumlah_stok - $request->jumlah;
            $gudang_utama->save();
            $penjualan->save();
        }
        return redirect()->route("penjualans.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['penjualans'] = Penjualan::find($id);
        $data['gudangs'] = Gudang::all();
        $data['customers'] = Customer::all();
        return view('penjualan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $penjualan = Penjualan::find($id);
        $barang = Gudang::find($penjualan->gudang_id);
        $barang->jumlah_stok = $barang->jumlah_stok + ($request->jumlah - $barang->jumlah_stok);
        $barang->save();

        // $pass = password_hash($request->password, PASSWORD_DEFAULT);
        $penjualan->gudang_id = $request->gudang_id;
        $penjualan->customer_id = $request->customer_id;
        $penjualan->jumlah = $request->jumlah;
        $penjualan->harga = $request->harga;
        $penjualan->keterangan = $request->keterangan;
        $penjualan->user_id = $request->user_id;
        $penjualan->save();

        Alert::success('Perubahan Berhasil', "Data '$barang->nama_barang' Berhasil Diubah");
        return redirect()->route("penjualans.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $penjualan = Penjualan::find($id);
        $barang = $penjualan->gudang;
        $barang->jumlah_stok += $penjualan->jumlah;
        $barang->save();

        $penjualan->delete();

        return redirect()->route('penjualans.index');
    }
}
