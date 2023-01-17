<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gudangs['gudangs'] = Gudang::all();
        return view('gudang.index', $gudangs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gudang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gudang = new Gudang();
        // $pass = password_hash($request->password, PASSWORD_DEFAULT);
        $gudang->nama_barang = $request->nama_barang;
        $gudang->jumlah_stok = $request->jumlah_stok;
        $gudang->jenis_barang = $request->jenis_barang;
        $gudang->harga_jual = $request->harga_jual;
        $gudang->keterangan = $request->keterangan;
        $gudang->save();
        return redirect()->route("gudangs.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    
    public function show(Gudang $gudang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $gudangs = Gudang::find($id);
        return view('gudang.edit', ['gudangs' => $gudangs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,$id)
    {
        $gudang = Gudang::find($id);
        // $pass = password_hash($request->password, PASSWORD_DEFAULT);
        $gudang->nama_barang = $request->nama_barang;
        $gudang->jumlah_stok = $request->jumlah_stok;
        $gudang->jenis_barang = $request->jenis_barang;
        $gudang->harga_jual = $request->harga_jual;
        $gudang->keterangan = $request->keterangan;
        $gudang->save();
        Alert::success('Perubahan Berhasil', "Data '$gudang->nama_barang' Berhasil Diubah");
        return redirect()->route("gudangs.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gudang::destroy($id);
        return redirect()->route('gudangs.index')->with('success','Data Berhasil Dihapus');
    }

    public function validasiQR(Request $request){

        $barang = Gudang::Where('id', $request->qrscan)->first();

        if ($barang == null) {
            return response()->json([
                "Eror" => "Data Tidak Ditemukan Di Database"
            ]);
        }else{
            return response()->json([
                "Done" => "Data Berhasil Didapatkan"
            ]);
        }
    }
}
