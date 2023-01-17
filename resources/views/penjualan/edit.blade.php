@extends('layout/index')
@section('content')
    <section class="content-header ml-3 mb-2 pt-5">
        <title>Update | Penjualan</title>
        <div class="container-fluid">
            <h1>
                Penjualan
            </h1>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Penambahan Data Penjualan</h3>
                </div>

            {{name}} {{kelas}} {{data_buuku}}

                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('penjualans.update', $penjualans->id) }}" method="POST" enctype="multipart/form-data" id="quickForm">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-4">
                                <div class="form-group">
                                    <label for="gudang_id">Barang</label>
                                    <select readonly="readony" name="gudang_id" id="gudang_id" class="form-control">
                                        <option value="{{ $penjualans['gudang_id'] }}" hidden>
                                            {{ $penjualans->gudang->nama_barang }}
                                        </option>
                                        {{-- @foreach ($gudangs as $brg)
                                            <option value="{{ $brg->id }}">
                                                {{ $brg->nama_barang }}
                                            </option>
                                        @endforeach --}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-4">
                                <label>Customer</label>
                                <div class="form-group">
                                    <select class="form-control" name="customer_id">
                                        <option value="{{ $penjualans['customer_id'] }}" hidden>
                                            {{ $penjualans->customer->CompanyName }}
                                        </option>
                                        @foreach ($customers as $brg)
                                            <option value="{{ $brg->id }}">
                                                {{ $brg->CompanyName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" name="jumlah" class="form-control" id="exampleInputPassword1"
                                        placeholder="jumlah Barang Yang Tersedia" value="{{ old('jumlah') ? old('jumlah') : $penjualans['jumlah'] }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" name="harga" class="form-control" id="exampleInputPassword1"
                                        placeholder="harga Barang Yang Tersedia" value="{{ old('harga') ? old('harga') : $penjualans['harga'] }}" required>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" id="exampleInputPassword1"
                                        placeholder="keterangan Barang Yang Tersedia" value="{{ old('keterangan') ? old('keterangan') : $penjualans['keterangan'] }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input type="hidden" name="user_id" id="user_id"
                                    value="{{ Session::get('user')[0]['id'] }}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="tombol ml-3 mt-5">
                            <a href="{{ route('penjualans.index') }}" class="btn btn-warning">KEMBALI</a>
                            <button type="submit" class="btn btn-primary">TAMBAH</button>
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
