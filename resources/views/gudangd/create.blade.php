@extends('layout/index')
@section('content')
    <section class="content-header ml-3 mb-2 pt-5">
        <title>Create | Gudang Delivery</title>
        <div class="container-fluid">
            <h1>
                Gudang Delivery
            </h1>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Penambahan Data Gudang Delivery</h3>
                </div>

                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('gudangd.store') }}" method="POST" enctype="multipart/form-data" id="quickForm">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-4">
                                <label>Nama Barang</label>
                                <div class="form-group">
                                    <select class="form-control" name="penjualan_id">
                                        @foreach ($penjualans as $brg)
                                            <option value="{{ $brg->id }}">{{ $brg->gudang->nama_barang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-4">
                                <label>Nama Customer</label>
                                <div class="form-group">
                                    <select class="form-control" name="customer_id">
                                        @foreach ($customers as $prc)
                                            <option value="{{ $prc->id }}">{{ $prc->CompanyName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-4">
                                <label>Nama Sales</label>
                                <div class="form-group">
                                    <select class="form-control" name="salesman_id">
                                        @foreach ($saless as $sls)
                                            <option value="{{ $sls->id }}">{{ $sls->Nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="jumlah_stok">Jumlah Stok</label>
                                    <input type="number" name="jumlah_stok" class="form-control"
                                        id="exampleInputPassword1" placeholder="jumlah stok Barang Yang Tersedia" required>
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
                            <a href="{{ route('gudangd.index') }}" class="btn btn-warning">KEMBALI</a>
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
