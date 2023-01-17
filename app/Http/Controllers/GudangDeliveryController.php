<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Gudang;
use App\Models\GudangDelivery;
use App\Models\Penjualan;
use App\Models\Principal;
use App\Models\Salesman;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GudangDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $GudangD['gudangd'] = GudangDelivery::all();
        return view('gudangd.index', $GudangD);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['gudangd'] = new GudangDelivery();
        $data['penjualans'] = Penjualan::all();
        $data['customers'] = Customer::all();
        $data['saless'] = Salesman::all();
        return view('gudangd.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gudang = new GudangDelivery();
        // $pass = password_hash($request->password, PASSWORD_DEFAULT);
        $gudang->penjualan_id = $request->penjualan_id;
        $gudang->customer_id = $request->customer_id;
        $gudang->salesman_id = $request->salesman_id;
        $gudang->jumlah_stok = $request->jumlah_stok;
        $gudang->keterangan = $request->keterangan;

        $penjualan = Penjualan::find($request->penjualan_id);
        $gudang_utama = Gudang::find($penjualan->gudang_id);

        if ($penjualan != null) {
            $gudang_utama->jumlah_stok = $gudang_utama->jumlah_stok - $request->jumlah_stok;
            $gudang_utama->save();
            $gudang->save();
        }

        Alert::success('Berhasil', "Data '$gudang_utama->nama_barang' Berhasil Ditambah");
        return redirect()->route("gudangd.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GudangDelivery  $gudangDelivery
     * @return \Illuminate\Http\Response
     */
    public function show(GudangDelivery $gudangDelivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GudangDelivery  $gudangDelivery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['gudangd'] = GudangDelivery::find($id);
        $data['penjualans'] = Penjualan::all();
        $data['customers'] = Customer::all();
        $data['saless'] = Salesman::all();
        return view('gudangd.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GudangDelivery  $gudangDelivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gudang = GudangDelivery::find($id);
        $penjualan = Penjualan::find($gudang->penjualan_id);
        $gudang_utama = Gudang::find($penjualan->gudang_id);
        $gudang_utama->jumlah_stok = $gudang_utama->jumlah_stok + ($gudang->jumlah_stok - $request->jumlah_stok);
        $gudang_utama->save();

        // $pass = password_hash($request->password, PASSWORD_DEFAULT);
        $gudang->penjualan_id = $request->penjualan_id;
        $gudang->customer_id = $request->customer_id;
        $gudang->salesman_id = $request->salesman_id;
        $gudang->jumlah_stok = $request->jumlah_stok;
        $gudang->keterangan = $request->keterangan;
        $gudang->save();

        Alert::success('Perubahan Berhasil', "Data '$gudang_utama->nama_barang' Berhasil Diubah");
        return redirect()->route("gudangd.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GudangDelivery  $gudangDelivery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $delivery = GudangDelivery::find($id);
        $penjualan = Penjualan::find($delivery->penjualan_id);
        $gudang_utama = Gudang::find($penjualan->gudang_id);

        $gudang_utama->jumlah_stok += $delivery->jumlah_stok;
        $gudang_utama->save();
        $delivery->delete();

        return redirect()->route('gudangd.index')->with('success', 'Data Berhasil Dihapus');
    }
}
