@extends('layout/index')
@section('content')
    <section class="content-header ml-3 mb-2">
        <title>Edit | Bahan Baku Pembangunan</title>

        <div class="container-fluid">
            <div class="container">
                <h1>
                    Update Data Bahan Baku Pembangunan
                </h1>
                <ol class="breadcrumb mt-2">
                    <li class="active">" Data Bahan Baku - Edit - Change Data"</li>
                </ol>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="container">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Perubahan Data Bahan Baku, Harap Perhatikan Pengetikan !!!</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('gudangs.update', $gudangs->id) }}" method="POST" enctype="multipart/form-data"
                        id="quickForm">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_barang">Nama barang</label>
                                <input type="text" name="nama_barang" class="form-control" id="exampleInputEmail1"
                                    placeholder="Nama Barang / Merk Barang"
                                    value="{{ old('nama_barang') ? old('nama_barang') : $gudangs['nama_barang'] }}">
                                @error('nama_barang')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="jumlah_stok">jumlah_stok</label>
                                        <input type="text" name="jumlah_stok" class="form-control"
                                            id="exampleInputPassword1" placeholder="Jumlah Stok Bahan Baku"
                                            value="{{ old('jumlah_stok') ? old('jumlah_stok') : $gudangs['jumlah_stok'] }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="harga_jual">harga_jual</label>
                                        <input type="number" name="harga_jual" class="form-control"
                                            id="exampleInputPassword1" placeholder="Jumlah Stok Bahan Baku"
                                            value="{{ old('harga_jual') ? old('harga_jual') : $gudangs['harga_jual'] }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="jenis_barang" class="form-label">jenis Barang Bahan
                                            Baku</label>
                                        <div class="row ">
                                            <select class="form-control" name="jenis_barang" id="jenis_barang">
                                                <option value="{{ $gudangs->jenis_barang }}" hidden>
                                                    {{ $gudangs->jenis_barang }}
                                                </option>
                                                <option>~ Pilih Satuan ~</option>
                                                <option>UNIT</option>
                                                <option>PCS</option>
                                                <option>KG</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <input type="text" name="satuan" class="form-control" id="exampleInputPassword1"
                                    placeholder="Satuan/Unit/PCS/Box/Truck"
                                    value="{{ old('satuan') ? old('satuan') : $barang['satuan'] }} ">
                            </div> --}}


                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input class="form-control" name="keterangan" id="exampleFormControlTextarea1" rows="3"
                                    value="{{ old('keterangan') ? old('keterangan') : $gudangs['keterangan'] }}">
                            </div>
                            <div class="tombol ml-3 mt-5">
                                <a href="{{ route('gudangs.index') }}" class="btn btn-warning">KEMBALI</a>
                                <button type="submit" class="btn btn-primary">UPDATE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
