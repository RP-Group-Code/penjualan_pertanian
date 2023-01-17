<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Gudang;
use App\Models\GudangRetur;
use App\Models\Retur;
use App\Models\Salesman;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GudangReturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Guadngr['gudangr'] = GudangRetur::all();
        return view('gudangr.index', $Guadngr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['gudangr'] = new GudangRetur();
        $data['returs'] = Retur::all();
        $data['customers'] = Customer::all();
        $data['saless'] = Salesman::all();
        return view('gudangr.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gudang = new GudangRetur();
        // $pass = password_hash($request->password, PASSWORD_DEFAULT);
        $gudang->retur_id = $request->retur_id;
        $gudang->customer_id = $request->customer_id;
        $gudang->salesman_id = $request->salesman_id;
        $gudang->jumlah_stok = $request->jumlah_stok;
        $gudang->keterangan = $request->keterangan;

        $returan = Retur::find($request->retur_id);
        $gudang_utama = Gudang::find($returan->gudang_id);

        if ($returan != null) {
            $gudang_utama->jumlah_stok = $gudang_utama->jumlah_stok + $request->jumlah_stok;
            $gudang_utama->save();
            $gudang->save();
        }
        return redirect()->route("gudangr.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GudangRetur  $gudangRetur
     * @return \Illuminate\Http\Response
     */
    public function show(GudangRetur $gudangRetur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GudangRetur  $gudangRetur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['gudangr'] = GudangRetur::find($id);
        $data['returs'] = Retur::all();
        $data['customers'] = Customer::all();
        $data['saless'] = Salesman::all();
        return view('gudangr.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GudangRetur  $gudangRetur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gudang = GudangRetur::find($id);
        $returan = Retur::find($gudang->retur_id);
        $gudang_utama = Gudang::find($returan->gudang_id);
        $gudang_utama->jumlah_stok = $gudang_utama->jumlah_stok + ($request->jumlah_stok - $gudang->jumlah_stok);
        $gudang_utama->save();
        // $pass = password_hash($request->password, PASSWORD_DEFAULT);
        $gudang->retur_id = $request->retur_id;
        $gudang->customer_id = $request->customer_id;
        $gudang->salesman_id = $request->salesman_id;
        $gudang->jumlah_stok = $request->jumlah_stok;
        $gudang->keterangan = $request->keterangan;
        $gudang->save();
        Alert::success('Perubahan Berhasil', "Data '$gudang_utama->nama_barang' Berhasil Diubah");

        return redirect()->route("gudangr.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GudangRetur  $gudangRetur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $delivery = GudangRetur::find($id);
        $returan = Retur::find($delivery->retur_id);
        $gudang_utama = Gudang::find($returan->gudang_id);

        $gudang_utama->jumlah_stok -= $delivery->jumlah_stok;
        $gudang_utama->save();
        $delivery->delete();
        return redirect()->route('gudangr.index')->with('success','Data Berhasil Dihapus');
    }
}
