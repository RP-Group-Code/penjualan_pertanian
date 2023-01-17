@extends('layout/index')
@section('content')
    <section class="content-header ml-3 mb-2 pt-5">
        <title>Create | Gudang Utama</title>
        <div class="container-fluid">
            <h1>
                Gudang Utama
            </h1>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Penambahan Data Gudang Utama</h3>
                </div>

                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('gudangs.store') }}" method="POST" enctype="multipart/form-data" id="quickForm">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_barang">Nama barang</label>
                            <input type="text" name="nama_barang" class="form-control" id="exampleInputEmail1"
                                placeholder="Nama Barang" value="{{ old('nama_barang') }}" required>
                            {{-- @error('nama_barang')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror --}}
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="jumlah_stok">Jumlah Stok</label>
                                    <input type="number" name="jumlah_stok" class="form-control" id="exampleInputPassword1"
                                        placeholder="jumlah stok Barang Yang Tersedia" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="satuan" class="col-form-label">status Bahan Baku</label>
                                    <form>
                                        <div class="row ">
                                            <div class="form-group">
                                                <select class="form-control" name="jenis_barang" required>
                                                    <option>~ Pilih Jenis Barang ~</option>
                                                    <option>UNIT</option>
                                                    <option>PCS</option>
                                                    <option>KG</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="harga_jual">Harga Jual</label>
                                    <input type="number" name="harga_jual" class="form-control" id="exampleInputPassword1"
                                        placeholder="harga_jual Barang Yang Tersedia" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" id="exampleInputPassword1"
                                        placeholder="keterangan Barang Yang Tersedia" required>
                                </div>
                            </div>
                        </div>
                        <div class="tombol ml-3 mt-5">
                            <a href="{{ route('gudangs.index') }}" class="btn btn-warning">KEMBALI</a>
                            <button type="submit" class="btn btn-primary">TAMBAH</button>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(".tombol-tambah").click(function() {
            var id = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');

            Swal.fire({
                title: "Yakin ingin menghapus " + nama + " ?",
                text: "Anda tidak akan bisa mengembalikan data ini lagi !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#4CAF50',
                confirmButtonText: 'Ya, Hapus data !'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/destroy_barang/" + id + ""
                    Swal.fire(
                        'Terhapus!',
                        "" + nama + " Berhasil Dihapus.  ",
                        'success'
                    )
                }
            })
        })
    </script>

    <script>
        $(function() {
            $('#tblBarang').DataTable()
        })
    </script>
@endpush
